<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\NestingPage;
use App\Models\PageContent;
use App\Models\ParentPage;
use App\Models\ChildPage;
use App\Models\AkreditasiDepartment;
use App\Models\Content;
use App\Models\Leader;

class LandingController extends Controller
{
    public function index()
    {
        //Variable Global
        $pages = Page::all();
        $nestingPages = NestingPage::all();
        $parentPages = ParentPage::all();
        //Variable Local
        $content = Content::first();
        $leaders = Leader::all();
        
        // Mengambil PageContent yang terkait dengan NestingPage bernama 'Berita'
        $berita = PageContent::whereHas('nestingPage', function($query) {
            $query->where('name', 'Berita');
        })->get(); // Gunakan get() jika Anda ingin mengambil semua berita
        // dd($berita);

        return view('pages.frontend.beranda', compact('pages', 'nestingPages', 'parentPages', 'berita', 'content', 'leaders'));
    }

    public function pageShow($id)
    {
        //Variable Global
        $pages = Page::all();
        $nestingPages = NestingPage::all();
        $parentPages = ParentPage::all();
        //Variable Local
        $page = Page::find($id);
        return view('pages.frontend.pages.show', compact('page', 'pages', 'nestingPages', 'parentPages'));
    }

    public function nestingPageShow($id)
    {
        //Variable Global
        $pages = Page::all();
        $nestingPages = NestingPage::all();
        $parentPages = ParentPage::all();
        //Variable Local
        $nestingPage = NestingPage::find($id);
        $pageContents = PageContent::where('nesting_page_id', $id)
                        ->where('status', 'publish')
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('pages.frontend.nestingPages.show', 
            compact('nestingPage', 'pages', 'nestingPages', 'parentPages', 'pageContents')
        );
    }

    public function nestingPageContentShow($nestingPageId, $id)
    {
        //Variable Global
        $pages = Page::all();
        $nestingPages = NestingPage::all();
        $parentPages = ParentPage::all();
        //Variable Local
        $nestingPage = NestingPage::find($nestingPageId);
        $pageContent = PageContent::find($id);
        return view('pages.frontend.nestingPages.pageContents.show', compact('nestingPage', 'pageContent', 'pages', 'nestingPages', 'parentPages'));
    }

    public function childPageShow($id)
    {
        //Variable Global
        $pages = Page::all();
        $nestingPages = NestingPage::all();
        $parentPages = ParentPage::all();
        //Variable Local
        $childPage = ChildPage::find($id);
        return view('pages.frontend.childPages.show', compact('childPage', 'pages', 'nestingPages', 'parentPages'));
    }

    public function akreditasi()
    {
        //Variable Global
        $pages = Page::all();
        $nestingPages = NestingPage::all();
        $parentPages = ParentPage::all();
        
        //Variable Local
        $departments = AkreditasiDepartment::with(['akreditasiStudyPrograms.studyProgramDocuments'])->orderBy('created_at', 'asc')->get();
        
        return view('pages.frontend.akreditasi', compact('pages', 'nestingPages', 'parentPages', 'departments'));
    }
}
