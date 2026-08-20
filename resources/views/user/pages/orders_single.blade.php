@extends('front.layouts.master')
@section('main_content')
<style>
@media print {
    .no-print { display: none !important; }
    .breadcrumb-section { display: none !important; }
    header, footer, nav { display: none !important; }
    .top-bar { display: none !important; }
    .newsletter { display: none !important; }
    body { 
        padding: 0 !important; 
        margin: 0 !important; 
        background: white !important;
    }
    .container { 
        max-width: 100% !important; 
        padding: 0 !important;
        margin: 0 !important;
    }
    .invoice-section { 
        padding: 20px !important; 
        margin: 0 !important;
    }
    .card { 
        border: none !important; 
        box-shadow: none !important;
        margin: 0 !important;
    }
    .card-body { 
        padding: 0 !important; 
    }
    .invoice-table { 
        page-break-inside: avoid; 
    }
    * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
}
</style>

<!-- Breadcrumb -->
<section class="breadcrumb-section py-3 bg-light no-print">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.html" class="text-primary">Home</a></li>
                <li class="breadcrumb-item"><a href="customer-dashboard.html" class="text-primary">My Account</a></li>
                <li class="breadcrumb-item"><a href="customer-orders.html" class="text-primary">My Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Invoice Section -->
<section class="invoice-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Action Buttons -->
                <div class="text-center mb-3 no-print">
                    <button class="btn btn-primary" onclick="window.print()">
                        <i class="bi bi-printer me-2"></i>Print Invoice
                    </button>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- Invoice Content - Table Based Layout -->
                        <table class="invoice-table" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                            <!-- Invoice Header -->
                            <tr>
                                <td colspan="2" style="padding-bottom: 20px;">
                                    <table width="100%" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td width="50%" style="vertical-align: top;">
                                                <h2 style="color: #198754; margin: 0 0 15px 0; font-weight: bold;">INVOICE</h2>
                                                <p style="margin: 0;"><strong>Invoice #:</strong> ORD-2024-1001</p>
                                                <p style="margin: 0;"><strong>Date:</strong> November 10, 2025</p>
                                                <p style="margin: 0;"><strong>Status:</strong> <span style="background: #198754; color: white; padding: 3px 10px; border-radius: 4px; font-size: 12px;">Delivered</span></p>
                                            </td>
                                            <td width="50%" style="text-align: right; vertical-align: top;">
                                                <h4 style="margin: 0 0 10px 0; font-weight: bold;">FreshMart Grocery</h4>
                                                <p style="margin: 0;">123 Market Street</p>
                                                <p style="margin: 0;">New York, NY 10001</p>
                                                <p style="margin: 0;">Phone: (123) 456-7890</p>
                                                <p style="margin: 0;">Email: info@freshmart.com</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Divider -->
                            <tr>
                                <td colspan="2" style="padding: 15px 0;">
                                    <hr style="border: none; border-top: 1px solid #ddd; margin: 0;">
                                </td>
                            </tr>

                            <!-- Billing & Shipping Info -->
                            <tr>
                                <td colspan="2" style="padding-bottom: 20px;">
                                    <table width="100%" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td width="50%" style="vertical-align: top;">
                                                <h5 style="margin: 0 0 10px 0; font-weight: bold;">Bill To:</h5>
                                                <p style="margin: 0;"><strong>John Doe</strong></p>
                                                <p style="margin: 0;">456 Customer Avenue</p>
                                                <p style="margin: 0;">Los Angeles, CA 90001</p>
                                                <p style="margin: 0;">Phone: (987) 654-3210</p>
                                                <p style="margin: 0;">Email: john.doe@email.com</p>
                                            </td>
                                            <td width="50%" style="vertical-align: top; text-align: right;">
                                                <h5 style="margin: 0 0 10px 0; font-weight: bold;">Ship To:</h5>
                                                <p style="margin: 0;"><strong>John Doe</strong></p>
                                                <p style="margin: 0;">456 Customer Avenue</p>
                                                <p style="margin: 0;">Los Angeles, CA 90001</p>
                                                <p style="margin: 0;">Phone: (987) 654-3210</p>
                                                <p style="margin: 0;">Email: john.doe@email.com</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Order Items Table -->
                            <tr>
                                <td colspan="2" style="padding-bottom: 20px;">
                                    <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse: collapse; border: 1px solid #ddd;">
                                        <thead>
                                            <tr style="background-color: #f8f9fa;">
                                                <th style="text-align: left; padding: 12px; border: 1px solid #ddd; width: 5%;">#</th>
                                                <th style="text-align: left; padding: 12px; border: 1px solid #ddd; width: 45%;">Product</th>
                                                <th style="text-align: center; padding: 12px; border: 1px solid #ddd; width: 15%;">Quantity</th>
                                                <th style="text-align: right; padding: 12px; border: 1px solid #ddd; width: 15%;">Price</th>
                                                <th style="text-align: right; padding: 12px; border: 1px solid #ddd; width: 20%;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 12px; border: 1px solid #ddd;">1</td>
                                                <td style="padding: 12px; border: 1px solid #ddd;">
                                                    <strong>Fresh Green Apple</strong><br>
                                                    <span style="color: #6c757d; font-size: 13px;">Category: Fruits | Weight: 1kg</span>
                                                </td>
                                                <td style="text-align: center; padding: 12px; border: 1px solid #ddd;">2</td>
                                                <td style="text-align: right; padding: 12px; border: 1px solid #ddd;">$4.99</td>
                                                <td style="text-align: right; padding: 12px; border: 1px solid #ddd; font-weight: bold;">$9.98</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 12px; border: 1px solid #ddd;">2</td>
                                                <td style="padding: 12px; border: 1px solid #ddd;">
                                                    <strong>Organic Fresh Egg</strong><br>
                                                    <span style="color: #6c757d; font-size: 13px;">Category: Dairy | Quantity: 12 pcs</span>
                                                </td>
                                                <td style="text-align: center; padding: 12px; border: 1px solid #ddd;">1</td>
                                                <td style="text-align: right; padding: 12px; border: 1px solid #ddd;">$6.99</td>
                                                <td style="text-align: right; padding: 12px; border: 1px solid #ddd; font-weight: bold;">$6.99</td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 12px; border: 1px solid #ddd;">3</td>
                                                <td style="padding: 12px; border: 1px solid #ddd;">
                                                    <strong>Sweet Orange</strong><br>
                                                    <span style="color: #6c757d; font-size: 13px;">Category: Fruits | Weight: 2kg</span>
                                                </td>
                                                <td style="text-align: center; padding: 12px; border: 1px solid #ddd;">1</td>
                                                <td style="text-align: right; padding: 12px; border: 1px solid #ddd;">$8.99</td>
                                                <td style="text-align: right; padding: 12px; border: 1px solid #ddd; font-weight: bold;">$8.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!-- Order Summary -->
                            <tr>
                                <td colspan="2">
                                    <table width="100%" cellpadding="5" cellspacing="0">
                                        <tr>
                                            <td width="40%" style="vertical-align: top;">
                                                <table width="100%" cellpadding="5" cellspacing="0">
                                                    <tr>
                                                        <td width="50%" style="vertical-align: top;">
                                                            <h6 style="margin: 0 0 10px 0; font-weight: bold;">Payment Method:</h6>
                                                            <p style="margin: 5px 0;">PayPal</p>
                                                        </td>
                                                        <td width="50%" style="vertical-align: top;">
                                                            <h6 style="margin: 0 0 10px 0; font-weight: bold;">Delivery Method:</h6>
                                                            <p style="margin: 5px 0;">Standard Delivery (3-5 business days)</p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width="20%" style="vertical-align: top;">
                                            </td>
                                            <td width="40%">
                                                <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse: collapse;">
                                                    <tr>
                                                        <td style="padding: 0;">Subtotal:</td>
                                                        <td style="text-align: right; padding: 0; font-weight: bold;">$46.91</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;">Discount (5%):</td>
                                                        <td style="text-align: right; padding: 0; color: #dc3545;">-$2.35</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0;">Delivery Charge:</td>
                                                        <td style="text-align: right; padding: 0;">$5.99</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 0 0 10px;">Tax (8%):</td>
                                                        <td style="text-align: right; padding: 0 0 10px;">$4.05</td>
                                                    </tr>
                                                    <tr style="border-top: 2px solid #000;">
                                                        <td style="padding: 8px 0; font-size: 18px;"><strong>Total:</strong></td>
                                                        <td style="text-align: right; padding: 8px 0; font-size: 20px; font-weight: bold; color: #198754;">$45.99</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <!-- Divider -->
                            <tr>
                                <td colspan="2" style="padding: 15px 0;">
                                    <hr style="border: none; border-top: 1px solid #ddd; margin: 0;">
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="text-center mt-3 no-print">
                    <a href="{{route('orders')}}" class="text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection