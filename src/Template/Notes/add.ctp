<script type="text/javascript">
function submitForm() {
	
	var title = document.getElementById("note_title");
	if (title.value == "" ) {
		alert('Tiêu đề không được để trống ! Hãy nhập vào !');
		title.focus();
		return false;
	}

	if ($.trim($('#note_content').val())==="") {
		alert('Nội dung ghi chú không được để trống ! Hãy nhập vào !');
		document.addForm.content.focus();
		return false;
	}
	
	
	if (confirm('Bạn có chắc chắn muốn tạo thêm ghi chú mới không ?')) {
		return true;
	} else {
		return false;
	}
}
</script>

<h2>Thêm ghi chú mới</h2>
<br />
<form action="" method="post" name="addForm" id="addForm" onsubmit="return submitForm();" >
<div style="padding: 10px;">
<label style="font-weight: bold;font-size: medium;">Tiêu đề:</label>
<br><br>
<input type="text" name="title" id="note_title" value="<?php if (isset($note['title'])) { echo $note['title'];} else { echo ""; } ?>" />
<br><br>
<label style="font-weight: bold;font-size: medium;">Nội dung ghi chú:</label>
<br><br>
<textarea name="content" id="note_content" rows="8"><?php if (isset($note['content'])) { echo $note['content']; } else { echo ""; } ?></textarea>
<br><br>
<input type="submit" name="editBtn" id="editBtn" value="Lưu nội dung" />
</div>
</form>

<div style="margin-top: 10px;">
<?php echo $this->Html->link('<< Quay trở về trang trước' , '/notes/' , array('target' => '_self')); ?>
</div>