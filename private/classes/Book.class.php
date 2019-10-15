<?php


class Book extends DatabaseObject
{
    static protected $table_name = 'books';
    static protected $db_columns = ['id', 'title', 'author', 'date', 'content'];

    public $id;
    public $title;
    public $author;
    public $date;
    public $content;

    /**
     * Book constructor.
     * @param $title
     * @param $author
     * @param $date
     * @param $content
     */
    public function __construct($args = [])
    {
        $this->title = $args['title'] ?? '';
        $this->author = $args['author'] ?? '';
        $this->date = $args['date'] ?? '';
        $this->content = $args['content'] ?? '';
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }/**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    protected function validate()
    {
        $this->errors = [];

        if(is_blank($this->title)) {
            $this->errors[] = "Title can't be blank.";
        }

        if(!has_length($this->title, ['min' => 3, 'max' => 60])) {
            $this->errors[] = "Title can be only between 3 and 60 characters.";
        }

        if(is_blank($this->author)) {
            $this->errors[] = "Author can't be blank.";
        }

        if(!has_length($this->author, ['min' => 3, 'max' => 60])) {
            $this->errors[] = "Author can be only between 3 and 60 characters.";
        }

        return $this->errors;
    }

}