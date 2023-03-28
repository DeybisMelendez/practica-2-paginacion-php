<?php if (isset($message)): ?>
    <style>
        #autodestroy {
            cursor: pointer;
            padding: 12px;
            position:fixed;
            width:100%;
        }
    </style>
    <div class="teal-bg white box" id="autodestroy">
        <p><?=$message?></p>
    </div>
    <script>
        autodestroy = document.querySelector("#autodestroy");
        autodestroy.onclick = function() {
            autodestroy.style.display = "none";
        }
    </script>
<?php endif; ?>