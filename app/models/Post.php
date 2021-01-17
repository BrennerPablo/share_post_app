<?php

class Post {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getPosts(){
        $this->db->query('
            select
                a.id post_id,
                date(a.created_at) created_at,
                a.user_id,
                a.title,
                a.body,
                b.name user_name

            from posts a
            left join (
                select id, name from users
            ) b on b.id = a.user_id

            order by a.id desc
        ');

        $results = $this->db->resultSet();

        return $results;

    }

    public function getPostById($id){
        
        $this->db->query('
            select *
            from posts
            where id = :id
        ');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;

    }

    public function addPost($data){
        $this->db->query('
            insert into posts (
                `user_id`,
                `title`,
                `body`
            ) values (
                :user_id,
                :title,
                :body
            )
        ');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($id, $data){
        $this->db->query('
            update posts
            set
                title = :title, 
                body = :body
            where id = :id
        ');

        $this->db->bind(':id', $id);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id){
        $this->db->query('
            delete from posts where id = :id
        ');

        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

}
