<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Utils\CategoryTreeAdminList;
use App\Entity\Category;

/**
 * @Route("/admin")
 */

class AdminController extends AbstractController
{
    /**
     * @Route("/", name="admin_main_page")
     */
    public function index()
    {
        return $this->render('admin/my_profile.html.twig');
    }

    /**
     * @Route("/categories", name="categories")
     */
    public function categories(CategoryTreeAdminList $categories)
    {
        $categories->getCategoryList($categories->buildTree());

        return $this->render('admin/categories.html.twig', [
          'categories'=>$categories->categorylist
        ]);
    }

    /**
     * @Route("/edit_category", name="edit_category")
     */
    public function edit_categories()
    {
        return $this->render('admin/edit_category.html.twig');
    }

    /**
     * @Route("/delete_category/{id}", name="delete_category")
     */
    public function delete_category(Category $category) //param converter symfony will automatically find
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();
        return $this->redirectToRoute('categories');
    }

    /**
     * @Route("/videos", name="videos")
     */
    public function videos()
    {
        return $this->render('admin/videos.html.twig');
    }

    /**
     * @Route("/upload", name="upload")
     */
    public function upload()
    {
        return $this->render('admin/upload.html.twig');
    }

    /**
     * @Route("/users", name="users")
     */
    public function users()
    {
        return $this->render('admin/users.html.twig');
    }
}
