<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event) {
        $this->Crud->mapAction('index', 'Crud.Index');
        $this->Crud->addListener('Crud.Api');
        //$this->Crud->addListener('Crud.ApiPagination');
        $this->Crud->addListener('Crud.ApiQueryLog');

        parent::beforeFilter($event);
    }

    public function initialize()
    {
        parent::initialize();
    }

    public function isAuthorized($user) {
        return true;
    }

    /**
     *
     *
     */
    protected function _preparePaginateQuery($params = []) {
        $this->Crud->on('beforePaginate', function(Event $event) use ($params) {
            extract($params);
            $paginationQuery = $event->subject()->query;

            if (!empty($query))
            {
                $paginationQuery->where(['Users.json_text LIKE' => '%' . $query . '%']);
            }

            $this->paginate['limit'] = $per_page;
            $this->paginate['page'] = $current_page;
        });

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        // $defaultParams = [
        //     'query' => null,
        //     'current_page' => 1,
        //     'per_page' => 10,
        // ];
        //
        // $query = isset($this->request->query['q']) ? $this->request->query['q'] : $defaultParams['query'];
        // $current_page = isset($this->request->query['page']) ? $this->request->query['page'] : $defaultParams['current_page'];
        // $per_page = isset($this->request->query['limit']) ? $this->request->query['limit'] : $defaultParams['per_page'];
        //
        // $params = compact('query', 'current_page', 'per_page');
        //
        // $params = array_merge($defaultParams, $params);
        //
        // $this->_preparePaginateQuery($params);

        $this->Crud->on('afterPaginate', function(Event $event) {
            // foreach ($event->subject()->entities as $index => $entity) {
            //     $array = $entity->toArray();
            //     if (isset($array['EventTicketSalesDelegates'])) {
            //         foreach($array['EventTicketSalesDelegates'] as $property => $value) {
            //             $entity->{$property} = $value;
            //         }
            //     }
            //     if (isset($array['EventTicketSalesSponsors'])) {
            //         foreach($array['EventTicketSalesSponsors'] as $property => $value) {
            //             $entity->{$property} = $value;
            //         }
            //     }
            // }
        });

        return $this->Crud->execute();
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $User = $this->Users->get($id, [
            'contain' => []
        ]);
        $this->set('User', $User);
        $this->set('_serialize', ['User']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $User = $this->Users->find()->where(['email' => $this->request->data['email']])->first();
            if(empty($User) || $User == null) {
                $User = $this->Users->newEntity();
            }
            $data = $this->request->data;
            $User = $this->Users->patchEntity($User, $data);
            if ($this->Users->save($User)) {
                $this->Flash->success('The User has been saved.');
            } else {
                $this->Flash->error('The User could not be saved. Please, try again.');
            }
        }
        $this->set(compact('User'));
        $this->set('_serialize', ['User']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $User = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $User = $this->Users->patchEntity($User, $this->request->data);
            if ($this->Users->save($User)) {
                $this->Flash->success('The User has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The User could not be saved. Please, try again.');
            }
        }
        $this->set(compact('User'));
        $this->set('_serialize', ['User']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $User = $this->Users->get($id);
        if ($this->Users->delete($User)) {
            $this->Flash->success('The User has been deleted.');
        } else {
            $this->Flash->error('The User could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        $data = $_GET;
        if($this->request->is('get')) {
            if(isset($data['search_field']) && $data['search_field'] != '') {
                $Users = $this->Users->find('all')->where([
                    'OR' => [
                        ['name LIKE' => '%'.$data['search_field'].'%'],
                        ['company LIKE' => '%'.$data['search_field'].'%'],
                        ['mobile LIKE' => '%'.$data['search_field'].'%'],
                        ['phone LIKE' => '%'.$data['search_field'].'%'],
                    ]

                ])->contain([
                    'DelegatesEventTicketSales' => ['Events']
                ]);

            } else {
                $Users = $this->Users->find('all')->contain(['DelegatesEventTicketSales' => ['Events'], 'SponsorsEventTicketSales' => ['Events']]);
            }

            $this->paginate = [
                'maxLimit' => 10
            ];
            $this->set('Users', $this->paginate($Users));
        }
    }
}
