<?php
class CpagesController extends AppController {

	public function admin_index(){
		if($this->Auth->user('role') > 1){
			return $this->redirect(['controller' => 'cpages', 'action' => 'add']);
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_add(){
		if($this->Auth->user('role') > 1){
			if($this->request->is('post')){
				$this->Cpage->create;
				$this->Cpage->saveField('user_id', $this->Auth->user('id'));
				$this->Cpage->saveField('name', $this->request->data['Cpages']['name']);
				$this->Cpage->saveField('slug', $this->request->data['Cpages']['slug']);
				$this->Cpage->saveField('content', $this->request->data['Cpages']['content']);
				$this->Session->setFlash('Page créée avec succès !', 'success');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_list(){
		if($this->Auth->user('role') > 1){
			$this->set('data', $this->Cpage->find('all'));
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_delete($id){
		if($this->Auth->user('role') > 1){
			if($this->Cpage->findById($id)){
				$this->Cpage->delete($id);
				$this->Session->setFlash('Page supprimée !', 'success');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
			else{
				$this->Session->setFlash('Cette page n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function admin_edit($id){
		if($this->Auth->user('role') > 1){
			if($this->Cpage->findById($id)){
				$this->set('data', $this->Cpage->find('first', ['conditions' => ['Cpage.id' => $id]]));
				if($this->request->is('post')){
					$this->Cpage->id = $id;
					$this->Cpage->saveField('name', $this->request->data['Cpages']['name']);
					$this->Cpage->saveField('slug', $this->request->data['Cpages']['slug']);
					$this->Cpage->saveField('content', $this->request->data['Cpages']['content']);
					$this->Session->setFlash('Page éditée !', 'success');
					return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
				}
			}
			else{
				$this->Session->setFlash('Cette page n\'existe pas !', 'error');
				return $this->redirect(['controller' => 'cpages', 'action' => 'list']);
			}
		}
		else{
			throw new NotFoundException();
		}
	}

	public function read($slug){
		if($this->Cpage->findBySlug($slug)){
			$this->set('data', $this->Cpage->find('first', ['conditions' => ['Cpage.slug' => $slug]]));
		}
		else{
			throw new NotFoundException();
		}
	}
}