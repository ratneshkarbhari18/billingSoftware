<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container">
        <h2 class="welcome-text"><?php echo $title; ?></h2>
        <p class="task-description flow-text"><?php echo $taskData["description"]; ?></p>
        <h4>People working on this:</h4>
        <?php for($i=0;$i<count($employees);$i++): ?>
        <?php echo ($i+1).'. '.$employees[$i]["fname"].' '.$employees[$i]["lname"]; ?>
        <?php endfor; ?>
        <h4>Task Files:</h4>
        <?php $i=1; $taskFiles = json_decode($taskData["files"],TRUE); $i=1; foreach($taskFiles as $tf):  ?>
        <a href="<?php echo site_url('assets/task_files/'.$tf); ?>" class="btn" id="<?php echo $tf; ?>"  download>File <?php echo $i; ?></a>
        <?php $i++; endforeach; ?>
        <?php foreach($task_comments as $tc): ?>
            <p><?php echo $tc["body"]; ?></p>
        <?php endforeach; ?>
        <h4>Add a Comment:</h4>
        <textarea id="add-comment" class="materialize-textarea"></textarea>
        <div id="filesBox">
            <!-- <input type="file" class="comment-file" id="file1"> -->
        </div>
        <br><br>
        <button type="button" class="btn" id="postCommentButton">Post Comment</button>
    </div>
</main>
<script>
$("button#postCommentButton").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "<?php echo site_url("add-comment-to-task-api"); ?>",
        data: {
            "user_id" : "<?php echo $_SESSION["id"]; ?>",
            "task_id" : "<?php echo $taskData["id"]; ?>",
            "comment" : $("textarea#add-comment").val()
        },
        success: function (response) {
            if(response=="done"){
                location.reload();
            }
        }
    });    
});
</script>