document.addEventListener("DOMContentLoaded", function () {
    // Retrieve the queue data from localStorage (if it exists)
    const storedQueueData = JSON.parse(localStorage.getItem("queueData")) || [];
    let nextTicketNumber = storedQueueData.length > 0 ? Math.max(...storedQueueData) + 1 : 1;

    const enqueueButton = document.getElementById("enqueue-button");
    const queue = document.querySelector(".queue");
    const waitingList = document.getElementById("waiting-list");
    const currentNumberDisplay = document.getElementById("current-number");

    // Initialize the queue with data from localStorage
    storedQueueData.forEach((ticketNumber) => {
        addCustomerToQueue(ticketNumber);
    });

    enqueueButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the form from submitting

        const applicationNumber = document.getElementById("application-number").value;
        const department = document.getElementById("department").value;
        const name = document.getElementById("name").value;

        if (name) {
            // Add the new customer to the queue
            addCustomerToQueue(nextTicketNumber);

            // Store the updated queue data in localStorage
            storedQueueData.push(nextTicketNumber);
            localStorage.setItem("queueData", JSON.stringify(storedQueueData));

            // Update the current number display
            currentNumberDisplay.textContent = nextTicketNumber;

            nextTicketNumber++;
        }
    });

    // Add logic for dequeueing and serving next customer
    // ...

    function addCustomerToQueue(ticketNumber) {
        // Create a new queue item
        const queueItem = document.createElement("div");
        queueItem.classList.add("queue-item");
        queueItem.innerHTML = `
            <span class="ticket-number">${ticketNumber}</span>
            <!-- Add other customer details here -->
        `;
        queue.appendChild(queueItem);

        // Add to the waiting list
        const waitingListItem = document.createElement("li");
        waitingListItem.textContent = `Customer ${ticketNumber}`;
        waitingList.appendChild(waitingListItem);
    }
});


