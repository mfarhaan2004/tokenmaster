document.addEventListener("DOMContentLoaded", function () {
    let nextTicketNumber = 1;

    const enqueueButton = document.getElementById("enqueue-button");
    const queue = document.querySelector(".queue");
    const waitingList = document.getElementById("waiting-list");
    const currentNumberDisplay = document.getElementById("current-number");

    enqueueButton.addEventListener("click", function (e) {
        e.preventDefault(); // Prevent the form from submitting

        const applicationNumber = document.getElementById("application-number").value;
        const department = document.getElementById("department").value;
        const name = document.getElementById("name").value;

        if (name) {
            // Add the new customer to the queue
            addCustomerToQueue(nextTicketNumber, name);

            // Update the current number display
            currentNumberDisplay.textContent = nextTicketNumber;

            nextTicketNumber++;
        }
    });

    // Add logic for dequeueing and serving the next customer
    // ...

    function addCustomerToQueue(ticketNumber, name) {
        // Create a new queue item
        const queueItem = document.createElement("div");
        queueItem.classList.add("queue-item");
        queueItem.innerHTML = `
            <span class="ticket-number">${ticketNumber}</span>
            <span class="customer-name">${name}</span>
            <!-- Add other customer details here -->
        `;
        queue.appendChild(queueItem);

        // Add to the waiting list
        const waitingListItem = document.createElement("li");
        waitingListItem.textContent = `${name} (${ticketNumber})`;
        waitingList.appendChild(waitingListItem);
    }
});
