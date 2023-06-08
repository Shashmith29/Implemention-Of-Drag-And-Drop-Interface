<!DOCTYPE html>
<html>

<head>
    <title>Drag and Drop Assignment</title>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 250px;

            padding: 10px;
        }

        .item {
            width: 200px;
            height: 200px;
            background-color: #f2f2f2;
            border: 1px solid #999;
            border-radius: 5px;
            cursor: grab;
            margin-top: 20px;
        }

        .item:hover {
            background-color: #e6e6e6;
        }

        .droppable {
            background-color: #d9edff;
            border: 1px dashed #428bca;
        }

        .success-message {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }

        #container1 h1 {
            text-align: center;
        }

        button {
            height: 50px;
            width: 140px;
            margin-left: 800px;
        }

        button h1 {
            text-align: center;
            font-family: 'Josefin Sans', sans-serif;
            font-family: 'Playfair', serif;
            margin-top: 5px;
        }

        .success-message {
            margin-top: 10px;
            font-weight: bold;
            color: green;

            font-family: 'Josefin Sans', sans-serif;
            font-family: 'Playfair', serif;
            font-size: 25px;
            margin-left: 720px;
        }
    </style>
</head>

<body>
    <h1>Drag and Drop Assignment</h1>

    <div class="container droppable" id="container1" ondrop="drop(event)" ondragover="allowDrop(event)">
        <div class="item" draggable="true" ondragstart="drag(event)" id="item1">
            <h1>Item 1</h1>
        </div>
        <div class="item" draggable="true" ondragstart="drag(event)" id="item2">
            <h1>Item 2</h1>
        </div>
        <div class="item" draggable="true" ondragstart="drag(event)" id="item3">
            <h1>Item 3</h1>
        </div>
    </div>

    <div class="container droppable" id="container2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

    <p id="successMessage" class="success-message"></p>

    <button onclick="resetContainers()">
        <h1>RESET</h1>
    </button>

    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function drag(event) {
            event.dataTransfer.setData("text", event.target.id);
        }

        function drop(event) {
            event.preventDefault();
            var data = event.dataTransfer.getData("text");
            var draggedItem = document.getElementById(data);
            event.target.appendChild(draggedItem);
            document.getElementById("successMessage").textContent = "Item dropped successfully!";
        }

        function resetContainers() {
            var container1 = document.getElementById("container1");
            var container2 = document.getElementById("container2");
            container2.innerHTML = "";
            container1.innerHTML = `
        <div class="item" draggable="true" ondragstart="drag(event)" id="item1"><h1>Item 1</h1></div>
        <div class="item" draggable="true" ondragstart="drag(event)" id="item2"><h1>Item 2</h1></div>
        <div class="item" draggable="true" ondragstart="drag(event)" id="item3"><h1>Item 3</h1></div>
      `;
            document.getElementById("successMessage").textContent = "";
        }
    </script>
</body>

</html>