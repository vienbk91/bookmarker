<h2><?php echo $note->title ?></h2>
<br>
<div style="padding-left: 10px;">
<div>
<?php echo str_replace("\n", "<br>", $note->content); ?>
</div>
<br>&nbsp;
<div style="font-size: small;">
Ngày tạo: <?php echo date('Y-m-d H:i:s',strtotime($note->created)); ?>
<br>
Ngày sửa: <?php echo date('Y-m-d H:i:s',strtotime($note->modified)); ?>
</div>
</div>
<br><br>
<?php echo $this->Html->link('Quay lại trang chủ' , '/notes/'); ?>
&nbsp;&nbsp; | &nbsp;&nbsp;
<?php echo $this->Html->link('Chỉnh sửa Note' , '/notes/edit/' . $note->id , array('target' => '_self')); ?>
