<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Receipt SL{{$sale->id }}</title>
    <link rel="stylesheet" href="style.css" media="all" />
    <style >
              @font-face {
          font-family: SourceSansPro;
          src: url(SourceSansPro-Regular.ttf);
        }

        .clearfix:after {
          content: "";
          display: table;
          clear: both;
        }

        a {
          color: #1B1338;
          text-decoration: none;
        }

        body {
          position: relative;
          width: 18cm;  
          height: 29.7cm; 
          margin: 0 auto; 
          color: #555555;
          background: #FFFFFF; 
          font-family: Arial, sans-serif; 
          font-size: 14px; 
          font-family: SourceSansPro;
        }

        header {
          padding: 10px 0;
          margin-bottom: 20px;
          border-bottom: 1px solid #AAAAAA;
        }

        #logo {
          float: left;
          margin-top: 8px;
        }

        #logo img {
          height: 100px;
          width: 250px;
        }

        #company {
          float: right;
          text-align: right;
        }


        #details {
          margin-bottom: 50px;
        }

        #client {
          padding-left: 6px;
          border-left: 6px solid #1B1338;
          float: left;
        }

        #client .to {
          color: #777777;
        }

        h2.name {
          font-size: 1.4em;
          font-weight: normal;
          margin: 0;
        }

        #invoice {
          float: right;
          text-align: right;
        }

        #invoice h1 {
          color: #1B1338;
          font-size: 2.4em;
          line-height: 1em;
          font-weight: normal;
          margin: 0  0 10px 0;
        }

        #invoice .date {
          font-size: 1.1em;
          color: #777777;
        }

        table {
          width: 100%;
          border-collapse: collapse;
          border-spacing: 0;
          margin-bottom: 20px;
        }

        table th,
        table td {
          padding: 20px;
          background: #EEEEEE;
          text-align: center;
          border-bottom: 1px solid #FFFFFF;
        }

        table th {
          white-space: nowrap;        
          font-weight: normal;
        }

        table td {
          text-align: right;
        }

        table td h3{
          color: #1B1338;
          font-size: 1.2em;
          font-weight: normal;
          margin: 0 0 0.2em 0;
        }

        table .no {
          color: #FFFFFF;
          font-size: 1.6em;
          background: #1B1338;
        }

        table .desc {
          text-align: left;
        }

        table .unit {
          background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
          background: #1B1338;
          color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
          font-size: 1.2em;
        }

        table tbody tr:last-child td {
          border: none;
        }

        table tfoot td {
          padding: 10px 20px;
          background: #FFFFFF;
          border-bottom: none;
          font-size: 1.2em;
          white-space: nowrap; 
          border-top: 1px solid #AAAAAA; 
        }

        table tfoot tr:first-child td {
          border-top: none; 
        }

        table tfoot tr:last-child td {
          color: #1B1338;
          font-size: 1.4em;
          border-top: 1px solid #1B1338; 

        }

        table tfoot tr td:first-child {
          border: none;
        }

        #thanks{
          font-size: 1.5em;
          margin-bottom: 50px;
          text-decoration: underline;
        }

        #notices{
          padding-left: 6px;
          border-left: 6px solid #1B1338;  
        }

        #notices .notice {
          font-size: 0.5em;
        }

        footer {
          color: #777777;
          width: 100%;
          height: 30px;
          position: absolute;
          bottom: 0;
          border-top: 1px solid #AAAAAA;
          padding: 8px 0;
          text-align: center;
        }


    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/blacklogo.png'))) }}">
      </div>
      <div id="company">
        <h2 class="name">Mburu Sheep Farm</h2>
        <div>Kajiado</div>
        <div>Kiserian</div>
        <div>Kajiado,Kenya</div>
        <div>0703417525</div>
        <div><a href="mailto:company@example.com">jonathanndung'u@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">RECEIPT FOR:</div>
          <h2 class="name">{{ $sale->customer_name }}</h2>
          
        </div>
        <div id="invoice">
          <h1>SL{{$sale->id }}</h1>
          <div class="date">Date of Receipt: {{ \Carbon\Carbon::now()->format('d F Y H:i:s') }}</div>
          
        </div>
      </div>
      <div style="background-color: #f0f0f0; padding: 15px; border-radius: 8px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
          <h3 style="color: #333; font-weight: bold; margin-bottom: 10px;">Receipt Information</h3>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">AMOUNT PAID</th>
            <th class="desc">QUANTITY</th>
            <th class="desc">PAYEMENT METHOD</th>
           
            
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no">01</td>
            <td class="desc">KES {{$sale->total_amount}}</td>
            
            <td class="desc">{{$sale->quantity}} sheep</td>
            <td class="desc">{{$sale->mode_of_payment}} </td>
            <th class="total">KES {{$sale->total_amount}}</th>
           
          </tr>
          
        </tbody>
        
      </table>
      <div style="background-color: #f0f0f0; padding: 15px; border-radius: 8px; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
          <h3 style="color: #333; font-weight: bold; margin-bottom: 10px;">Payment Break Down</h3>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">ID</th>
            <th class="desc">AMOUNT</th>
            <th class="desc">SLAUGHTER AMOUNT</th>          
            
           
            
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @php
                                        $totalAmount = 0;
                                    @endphp
          @foreach($sale->saleItems as $key => $saleItem)
          @php
                                        $totalAmount += $saleItem->amount + $saleItem->slaughter_amount;
                                    @endphp
          <tr>
            <td class="no">{{ $key + 1 }}</td>
            <td class="desc">{{$saleItem->id}}</td>
            <td class="desc">{{$saleItem->amount}}</td>
            <td class="desc">{{$saleItem->slaughter_amount}}</td>
            <td class="total">{{ $saleItem->amount + $saleItem->slaughter_amount }}</td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL(KSH)</td>
            <td>{{ $totalAmount }}</td>
          </tr>
          
          
       
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>KSH {{ $totalAmount }}</td>
          </tr>
        </tfoot>
      </table>
      <br>
      <div id="thanks">
        Served By: <span class="underline-text">{{ auth()->user()->name }}</span>
      </div>

      <div id="notices">
        <div></div>
        <div class="notice">System By @CaptainCyber Ke</div>
      </div>
    </main>
    <!--
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer> -->
  </body>
</html>