document.addEventListener("DOMContentLoaded", fetchTasks);

function fetchTasks() {
    fetch("../assets/php/fetch_tasks.php")
        .then(response => response.json())
        .then(tasks => {
            const taskList = document.getElementById("task-list");
            taskList.innerHTML = tasks.map(task => `
                <div data-id="${task.id}" class="task ${task.status==='completed' ? "completed" : "active"}">
                    <div class="left-tasks">
                        <input type="checkbox" 
                        ${task.status === 'completed' ? 'checked disabled' : ''} 
                        onclick="markComplete(${task.id}, this.checked)">
                        <span>${task.task}</span>
                    </div>
                    <div class="right-button">
                        <button onclick="deleteTask(${task.id})" class="btn">X Delete</button>
                    </div>
                </div>
                       `).join("");
                    });
                }
                // <button onclick="markComplete(${task.id})">✔</button>

function addTask() {
    let task = document.getElementById("task-input").value;
    if (task.trim() === "") return;

    fetch("../assets/php/add_task.php", {
        method: "POST",
        body: new URLSearchParams({ task })
    }).then(() => {
        fetchTasks();
        document.getElementById("task-input").value = "";
    });
}

function markComplete(id) {
    fetch("../assets/php/complete_task.php", {
        method: "POST",
        body: new URLSearchParams({ id })
    }).then(fetchTasks);
}

function deleteTask(id) {
    fetch("../assets/php/delete_task.php", {
        method: "POST",
        body: new URLSearchParams({ id })
    }).then(fetchTasks);
}
