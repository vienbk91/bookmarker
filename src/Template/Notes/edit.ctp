
<?php 
date_default_timezone_set("Asia/Tokyo");
?>
<form action="<?php ?>" method="post" name="editNoteForm" id="editNoteForm" >
Tiêu đề:<br>
<input type="text" name="title" id="title" value="<?php echo $note->title; ?>" />
<br>
Nội dung:<br>
<textarea rows="15" cols="20" name="content" id="content" ><?php echo $note->content; ?></textarea>
<br>
<input type="submit" name="updateNote" id="updateNote" value="Thay đổi nội dung Note" />
</form>
<br>
<?php echo $this->Html->link('<< Quay lại trang chủ ' , '/notes/index/'); ?> |
<?php echo $this->Html->link('Xem nội dung ghi chú >> ' , '/notes/view/' . $note->id); ?> 
