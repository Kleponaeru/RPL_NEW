<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Subscription Plans</title>
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .modal-buttons {
            margin-top: 20px;
        }

        /* Notification Styles */
        .notification {
            position: fixed;
            bottom: 0;
            right: 0;
            margin: 1rem;
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            display: none;
        }
    </style>
    <script>
        function showConfirmation(planName, planPrice) {
            // Get the modal element
            var modal = document.getElementById('confirmationModal');

            // Set the plan name and price in the modal content
            document.getElementById('planName').textContent = planName;
            document.getElementById('planPrice').textContent = planPrice;

            // Display the modal
            modal.style.display = 'flex';
        }

        function hideModal() {
            // Hide the modal
            var modal = document.getElementById('confirmationModal');
            modal.style.display = 'none';
        }

        function showPaymentSuccessNotification() {
            // Display a custom notification (you can replace this with a library like Toastify or others)
            var notification = document.getElementById('paymentSuccessNotification');
            notification.style.display = 'block';

            // Hide the notification after a delay (e.g., 3 seconds)
            setTimeout(function() {
                notification.style.display = 'none';
            }, 3000);
        }

        function subscribeConfirmed() {
            // Perform the subscription action here

            // Redirect to dashboard/pemilik
            window.location.href = '/dashboard/pemilik';

            // Show payment success notification
            showPaymentSuccessNotification();
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="flex items-center">
        <!-- Plan 1 -->
        <div class="bg-white p-6 rounded-md shadow-md mb-4 mr-4">
            <h2 class="text-lg font-semibold mb-2">Basic Plan</h2>
            <p class="text-gray-600 mb-2">Ideal for individuals who need basic waste disposal features.</p>
            <p class="text-gray-500 mb-4">Includes:</p>
            <ul class="list-disc pl-5 mb-4">
                <li>Waste collection up to 10kg</li>
                <li>Basic Support</li>
                <li>Access to Core Disposal Features</li>
            </ul>
            <p class="text-blue-500 font-semibold">Rp 15.000/month</p>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md"
                onclick="showConfirmation('Basic Plan', 'Rp 15.000/month')">Subscribe</button>
        </div>

        <!-- Plan 2 -->
        <div class="bg-white p-6 rounded-md shadow-md mb-4 mr-4">
            <h2 class="text-lg font-semibold mb-2">Standard Plan</h2>
            <p class="text-gray-600 mb-2">Perfect for small businesses with increased waste disposal needs.</p>
            <p class="text-gray-500 mb-4">Includes:</p>
            <ul class="list-disc pl-5 mb-4">
                <li>Waste collection up to 50kg</li>
                <li>Premium Support</li>
                <li>Access to Advanced Disposal Features</li>
            </ul>
            <p class="text-blue-500 font-semibold">Rp 30.000/month</p>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md"
                onclick="showConfirmation('Standard Plan', 'Rp 30.000/month')">Subscribe</button>
        </div>

        <!-- Plan 3 -->
        <div class="bg-white p-6 rounded-md shadow-md mb-4">
            <h2 class="text-lg font-semibold mb-2">Premium Plan</h2>
            <p class="text-gray-600 mb-2">For businesses with extensive waste disposal requirements.</p>
            <p class="text-gray-500 mb-4">Includes:</p>
            <ul class="list-disc pl-5 mb-4">
                <li>Unlimited Waste Collection</li>
                <li>Premium Support with 24/7 Assistance</li>
                <li>Access to All Disposal Features, including Exclusive Features</li>
            </ul>
            <p class="text-blue-500 font-semibold">Rp 60.000/month</p>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md"
                onclick="showConfirmation('Premium Plan', 'Rp 60.000/month')">Subscribe</button>
        </div>
    </div>

    <!-- Back Button -->
    <a href="{{ url()->previous() }}"
        class="absolute top-0 left-0 m-4 text-blue-500 hover:text-blue-700 font-bold text-lg border border-blue-500 rounded-full px-4 py-2">←
        Back</a>

    <!-- Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to subscribe to the <span id="planName"></span> plan for <span
                    id="planPrice"></span>?</p>
            <div class="modal-buttons">
                <button onclick="subscribeConfirmed()" class="bg-blue-500 text-white px-4 py-2 rounded-md">Yes</button>
                <button onclick="hideModal()" class="bg-gray-500 text-white px-4 py-2 rounded-md">No</button>
            </div>
        </div>
    </div>

    <!-- Payment Success Notification -->
    <div id="paymentSuccessNotification" class="notification">
        Payment Successful!
    </div>

</body>

</html>
