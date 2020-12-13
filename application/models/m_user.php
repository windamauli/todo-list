<?php 

	class m_user extends CI_Model {

		function __construct()
		{
			parent::__construct();
        }

        public function insertData($data)
		{
			$this->db->insert('user',$data);
        }

        public function addTask($data)
		{
			$this->db->insert('task',$data);
        }

        public function editTask($data,$xid)
		{
			$this->db->where('id_task',$xid);
			$this->db->update('task',$data);
		}
        
        public function login($data){
            $cond = array('username' => $data['username'] ,'password' => $data['password'] );
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where($cond);
            $query = $this->db->get();
            if ($query->num_rows() > 0){
                return $query;
            }else{
                return null;
            }
        }

        public function getById($xid)
		{
			$q = $this->db->select('*')->from('task')->where('id_user',$xid)->get();

			return $q->result();
        }

        public function getTaskById($xid)
		{
			$q = $this->db->select('*')->from('task')->where('id_task',$xid)->get();

			return $q->result();
        }

        public function hapus($id)
		{
			$this->db->where('id_task',$id);
			$this->db->delete('task');
        }
        
        public function edit_task($id){
            $this->db->from('task');
            $this->db->where('id_task', $id);

            $query = $this->db->get();
            return $query->result();
        }

        public function edit($id_task, $title, $date, $desc, $status){
            $data = array(
                'title' => $title,
                'date' => $date,
                'desc' => $desc,
                'status' => $status
            );

                
            $this->db->where('id_task', $id_task);
            $this->db->update('task', $data);
           
        }

        public function edit_status($id_task){
            $data = array(
                'status' => '1'
            );

            $this->db->where('id_task', $id_task);
            $this->db->update('task', $data);
        }


        public function getbyStatus($status, $id)
		{
			$q = $this->db->select('*')->from('task')->where('status',$status)->where('id_user',$id)->get();

			return $q->result();
        }
        
        public function getbyDate($date, $id)
		{
			$q = $this->db->select('*')->from('task')->where('date',$date)->where('id_user',$id)->get();

			return $q->result();
        }
        
        public function sortAsc($id)
		{
			$q = $this->db->select('*')->from('task')->where('id_user',$id)->order_by('date', 'asc')->get();

			return $q->result();
        }
        
        public function sortDesc($id)
		{
			$q = $this->db->select('*')->from('task')->where('id_user',$id)->order_by('date', 'desc')->get();

			return $q->result();
		}

    
    }
?>