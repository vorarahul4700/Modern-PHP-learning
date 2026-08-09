<?php

// switch
$status = "Processing";
switch ($status) {
    case "pending":
    case "processing":
        echo "Order is being processed";
        break;

    case "shipped":
        echo "Order has been shipped";
        break;

    case "delivered":
        echo "Order has been delivered";
        break;

    case "cancelled":
        echo "Order has been cancelled";
        break;

    default:
        echo "Unknown order status";
}


// match
$value = match ($status){
    'pending',"Processing" => "Order Is Being Processed",
    'Processing' => "Order Has Been Being Processed",
    'shipped' => 'Order Has Been Shipped',
    'delivered' => 'Order Has Been Delivered',
    'cancelled' => 'Order Has Been cancelled',
    default => 'Unknown Order Status'
};

echo $value;