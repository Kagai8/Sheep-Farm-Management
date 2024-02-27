<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goat;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Breed;
use App\Models\GoatProfile;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;
use Pdf;

class SalesController extends Controller
{
    public function SaleCreate(){
    
        $goats = GoatProfile::with('goat')
                ->whereHas('goat', function (Builder $query) {
                    $query->where('sale_status', 1)->where('status', '!=', 4);;
                })
                ->latest()
                ->get();

        $sales = Sale::with('saleItems')->latest()->limit(1)->get();
        

        return view('infarmer.sale.sale_add',compact('goats', 'sales'));
    }

    public function SaleStore(Request $request){
        // Retrieve the data from the request
            $data = $request->all();

            // Initialize total amount and quantity variables
                $totalAmount = 0;
                $totalQuantity = count($data['goat_id']);

                // Iterate through the sale items to calculate the total amount
                foreach ($data['amount'] as $key => $amount) {
                    // Add the amount and slaughter_amount (if provided) to the total amount
                    $totalAmount += $amount;
                    if (isset($data['slaughter_amount'][$key])) {
                        $totalAmount += $data['slaughter_amount'][$key];
                    }
                }

            // Create a new sale instance
            $sale = Sale::create([
                'customer_name' => $request->input('customer_name'),
                'mode_of_payment' => $request->input('mode_of_payment'),
                'total_amount' => $totalAmount,
                'quantity' => $totalQuantity,
                'created_by' => auth()->user()->name,
                'created_at' => Carbon::now(),
                
            ]);

            // Store the sale items
            foreach ($data['goat_id'] as $key => $goatId) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'goat_id' => $goatId,
                    'amount' => $data['amount'][$key],
                    'slaughter_amount' => $data['slaughter_amount'][$key] ?? null,
                    'created_at' => Carbon::now(),
                ]);

                // Update the life_status of the GoatProfile to "4" (Sold)
                GoatProfile::where('goat_id', $goatId)->update(['status' => 4]);
            }

        $notification = array(
            'message' => 'Sale Processed Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('sale.create')->with($notification);
    }

    public function SalesView(){

        // Retrieve ewe profiles
            $sales = Sale::latest()->get();

        return view('infarmer.sale.sale_view',compact('sales'));
    }

    public function SaleDetails($id){

        $sale = Sale::with('saleItems','goat')->findOrFail($id);


        return view('infarmer.sale.sale_details',compact('sale'));

    }

    public function SaleDelete($id)
    {
        try {
            // Find the sale record by ID
            $sale = Sale::findOrFail($id);

            // Delete the associated sale items
            $sale->saleItems()->delete();

            // Delete the sale record
            $sale->delete();

            $notification = [
                'message' => 'Sale Deleted Together With Sale Items Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('sale.view')->with($notification);

        } catch (\Exception $e) {
            $notification = [
                'message' => 'Failed to Delete Sale and Items',
                'alert-type' => 'error'
            ];

            // Handle any errors
            return redirect()->route('sale.view')->with($notification);
        }
    }

    public function SaleGenerateReceipt($id)
    {
        // Fetch data for the receipt
        $sale = Sale::with('saleItems')->findOrFail($id);

        // Generate PDF using the 'your-receipt-view' Blade view and the fetched data
        $pdf = PDF::loadView('infarmer.sale.sale_receipt', compact('sale'));

        // Return the PDF as a response
        return new Response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="Receipt_' . $sale->id . '.pdf"',
        ]);
    }

}
