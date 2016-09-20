<script>
function deleteNote() {
	if (confirm('Bạn có muốn xóa ghi chú này không ?')) {
		return true;
	} else {
		return false;
	}
}
</script>
<?php date_default_timezone_set("Asia/Tokyo"); ?>
<h2>Danh sách ghi chú</h2>
<div class="notes index large-9 medium-8 columns content">
<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Mã ghi chú</th>
                <th>Tiêu đề</th>
                <th>Ngày tạo</th>
                <th>Ngày chỉnh sửa</th>
                <th class="actions">Thao tác</th>
            </tr>
        </thead>
        <tbody>
		<?php foreach ($notes as $note) { ?>
			<tr>
				<td>
				<?php echo $note->id; ?>
				</td>
				<td>
				<?php echo $this->Html->link($note->title , '/notes/view/' . $note->id , array('target' => '_self')); ?>
				</td>
				<td>
				<?php echo date('Y-m-d H:i:s' , strtotime($note->created) ); ?>
				</td>
				<td>
				<?php echo date('Y-m-d H:i:s' , strtotime($note->modified) ); ?>
				</td>
				<td>
				<?php 
					echo $this->Html->link('Sửa' , '/notes/edit/' . $note->id , array(
							'target' => '_self' ,
							'class' => 'editNote'
							
					));
				?> | 
				<?php 
					echo $this->Html->link('Xóa' , '/notes/delete/' . $note->id , array(
							'target' => '_self' ,
							'class' => 'deleteNote' ,
							'onclick' => 'return deleteNote();'
							
					));
				?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

<div style="margin-top: 20px;" id="addNote">
<?php echo $this->Html->link('>> Thêm ghi chú mới' , '/notes/add/' , array(
		'target' => '_self' , 
		'onclick' => 'return addNewNote();'
)); ?>
</div>