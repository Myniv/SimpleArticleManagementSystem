<?php
namespace App\Models;

use App\Entities\Article;

class M_Article
{
    private $article;
    private $session;

    public function __construct()
    {
        $this->session = session();
        $this->article = $this->session->get('article') ?? [];
    }

    private function saveData()
    {
        $this->session->set('article', $this->article);
    }

    public function getAllArticle()
    {
        return $this->article;
    }

    public function getArticleById($id)
    {
        foreach ($this->article as $key => $value) {
            if ($value->getId() === $id) {
                return $value;
            }
        }
        return null;
    }

    public function addArticle(Article $article)
    {
        $this->article[] = $article;
        $this->saveData();
    }

    public function updateArticle(Article $article)
    {
        foreach ($this->article as $key => $value) {
            if ($value->getId() === $article->getId()) {
                $this->article[$key] = $article;
                $this->saveData();
            }
        }
        return null;
    }

    public function deleteArticle($id)
    {
        foreach ($this->article as $key => $value) {
            if ($value->getId() === $id) {
                unset($this->article[$key]);
                $this->saveData();
            }
        }
        return null;
    }
}