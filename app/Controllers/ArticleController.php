<?php

namespace App\Controllers;

use App\Entities\Article;
use App\Models\M_Article;

class ArticleController extends BaseController
{
    private $articleModel;

    public function __construct()
    {
        $this->articleModel = new M_Article();
    }
    public function index()
    {
        $data["articles"] = $this->articleModel->getAllArticle();
        return view('article/v_article_list', $data);
    }
    public function detail($slug)
    {
        preg_match('/(.+)--(\d+)-(.+)/', $slug, $matches);

        $title = str_replace('-', ' ', $matches[1]); // Everything before "--" && convert "-" to " " (space)
        $id = $matches[2];           // The number after "--"
        $shortdesc = $matches[3];    // Everything after "-id-"

        $data["article"] = $this->articleModel->getArticleById($id);
        return view('article/v_article_detail', $data);
    }

    public function create()
    {
        $type = $this->request->getMethod();
        if ($type == "GET") {
            return view("article/v_article_form");
        }

        $data = [
            'id' => $this->request->getPost("id"),
            'title' => $this->request->getPost("title"),
            'content' => $this->request->getPost("content")
        ];
        $rule = [
            'id' => 'required|integer',
            "title" => 'required|max_length[50]',
            'content' => 'required|max_length[255]'
        ];

        if (!$this->validateData($data, $rule)) {
            return view("article/v_article_form", ['errors' => $this->validator->getErrors()]);
        }

        $article = new Article($data['id'], $data['title'], $data['content']);
        $this->articleModel->addArticle($article);
        return redirect()->to("/article");
    }

    public function update($slug)
    {
        preg_match('/(.+)--(\d+)-(.+)/', $slug, $matches);

        $title = str_replace('-', ' ', $matches[1]); // Everything before "--" && convert "-" to " " (space)
        $id = $matches[2];           // The number after "--"
        $shortdesc = $matches[3];    // Everything after "-id-"

        $type = $this->request->getMethod();
        if ($type == "GET") {
            $data['article'] = $this->articleModel->getArticleById($id);
            return view("article/v_article_form", $data);
        }

        $data = [
            'id' => $this->request->getPost("id"),
            'title' => $this->request->getPost("title"),
            'content' => $this->request->getPost("content")
        ];
        $rule = [
            'id' => 'required|integer',
            "title" => 'required|max_length[50]',
            'content' => 'required|max_length[255]'
        ];

        if (!$this->validateData($data, $rule)) {
            return view("article/v_article_form", ['errors' => $this->validator->getErrors()]);
        }

        $article = new Article($data['id'], $data['title'], $data['content']);
        $this->articleModel->updateArticle($article);
        return redirect()->to("article");
    }

    public function delete($id)
    {
        $article = $this->articleModel->deleteArticle($id);
        return redirect()->to("/article");
    }
}