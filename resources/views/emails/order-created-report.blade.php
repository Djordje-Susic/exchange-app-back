@component('mail::message')
# Order Details

Somebody just bought currency on our system!

Id: {{$order->id}}<br>
Currency code: {{$order->quote_currency_code}}<br>
Exchange rate: {{$order->exchange_rate}}<br>
Surcharge percentage: {{$order->surcharge_percentage}}<br>
Surcharge amount: {{$order->surcharge_amount}}<br>
Discount percentage: {{$order->discount_percentage}}<br>
Discount amount: {{$order->discount_amount}}<br>
Amount purchased: {{$order->amount_purchased}}<br>
Amount paid: {{$order->amount_paid}}<br>
Created at: {{$order->created_at}}
@endcomponent
