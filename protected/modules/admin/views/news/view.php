<?php
$Labels=$model->attributeLabels();
echo '<h1>', $Labels['title'], ': ', $model->title, '</h1>';
echo '<h3>', $Labels['status'], ': ', $model->getStatusString(), '</h3>';
echo '<p><strong>', $Labels['summary'], '</strong>: ', $model->summary, '</p>';
echo '<p><strong>', $Labels['content'], '</strong>: ', $model->content, '</p>';
echo '<p><strong>', $Labels['position'], '</strong>: ', $model->position, '</p>';
echo '<p><strong>', $Labels['is_event'], '</strong>: ', $model->is_event, '</p>';
echo '<p><strong>', $Labels['created_at'], '</strong>: ', date("r", $model->created_at), '</p>';
echo '<p><strong>', $Labels['updated_at'], '</strong>: ', date("r", $model->updated_at), '</p>';
?>