<?php
namespace App\Controller;
use App\Controller\AppController;
use App\Model\Table\NotesTable;
use Cake\ORM\TableRegistry;
use Cake\Database\Schema\Table;
use Cake\Network\Exception\NotFoundException;

/**
 * Notes Controller
 *
 * @property \App\Model\Table\NotesTable $Notes
 */
class NotesController extends AppController {
	
	public function sayHello() {
		echo "Welcome to CakePHP3.3";
		exit; // not load missing view error
	}

	public function index() {
		// Lấy toàn bộ data có trong bảng note
		// $notes = $this->Notes->find('all' , array('order' => array('created' => 'asc')));
		// $this->set(compact('notes'));
		// Tao ra 1 instance
		$noteInstance = TableRegistry::get('Notes');
		// $notes = $noteInstance->find('all' , array('order' => array('id' => 'asc')));
		
		$notes = $noteInstance->find('all' , array(
				'fields' => array('id' , 'title' , 'content') ,
				'conditions' => array('title LIKE' => '%PHP%') ,
				'order' => array('id' => 'asc') ,
				'limit' => 5 ,
		));
		
		
		
		$this->set('notes' , $notes);
		
	}

	public function view($id = null) {
		// Lấy ra nội dung note có id = $id
		// Nếu sử dụng theo cách này thì nó sẽ trả về 1 mảng các object và trong view ta phải sử dụng foreach để hiển thị nó
		// $note = $this->Notes->find()->where(['id = ' => $id]);
		
		
		// Cach 2: su dung instance cua Notes
		$noteInstance = TableRegistry::get('Notes');
		$note = $noteInstance->findById($id)->first();
		
		if (!empty($note)) {
			$this->set(compact('note'));
		} else {
			throw new NotFoundException('Missing note');
		}
	}
	
	
	public function add() {
		$note = $this->Notes->newEntity();
		if ($this->request->is('post')) {
			$note = $this->Notes->patchEntity($note, $this->request->data);
			if ($this->Notes->save($note)) {
				$this->Flash->success('Tạo ghi chú thành công !');
				$this->redirect(array('controller' => 'notes' , 'action' => 'index'));
			} else {
				$this->Flash->error('Thêm ghi chú thất bại ! Hãy thực hiện lại.');
				$this->set('note' , $note);
			}
		}
	}
    
	/**
	 * Edit method
	 *
	 * @param string|null $id User id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null) {
	    $note = $this->Notes->get($id); 
	    if ($this->request->is(['patch', 'post', 'put'])) {
	        $note = $this->Notes->patchEntity($note , $this->request->data);
	        
	        if ($this->Notes->save($note)) {
	            $this->Flash->success('Sửa ghi chú thành công');
	            return $this->redirect(array('controller' => 'notes' , 'action' => 'index'));
	        } else {
	            $this->Flash->error('Sửa ghi chú thất bại ! Hãy thử lại 1 lần nữa!');
	        }
	    }
	    
	    $this->set(compact('note'));
	    $this->set('_serialize', ['note']);
	}
	
	public function delete($id = null) {
	    
	    $note = $this->Notes->get($id);
	    if ($this->Notes->delete($note)) {
	        $this->Flash->success('Xóa ghi chú thành công !');
	    } else {
	        $this->Flash->error('Xóa ghi chú thất bại !');
	    }
	    
	    $this->redirect(array('controller' => 'notes' , 'action' => 'index'));
	    
	    
	}
}