<?php
class Pages extends Controller {
    public function __construct() {

    }

    public function index() {
				if(isLoggedIn()){
					redirect('posts');
				}
        $data = [
            'title' => 'Share Posts',
            'description' => 'Sit tempor et magna ipsum diam vero ea duo, ut.',
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'about',
            'description' => 'Sit tempor et magna ipsum diam vero ea duo, ut.Cheer neer the none ever his, deemed earth for and.',
        ];
        $this->view('pages/about', $data);
    }
}