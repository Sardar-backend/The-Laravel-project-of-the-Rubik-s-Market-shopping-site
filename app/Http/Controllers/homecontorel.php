<?php

namespace App\Http\Controllers;

use App\Helpers\CalculatorClassFacade\CalculatorClassFacade;
use App\Helpers\Cart\Cart;
use App\Helpers\Cart\CartService;
use App\Helpers\TrendingContent;
use App\Models\blog;
use App\Models\Product;
use App\Notifications\notificationCode;
use App\Models\activecode;
use App\Models\adresse;
use App\Models\blogcategory;
use App\Models\comment;
use App\Models\contacts;
use App\Models\permission;
use App\Models\Product as ModelsProduct;
use App\Models\productcategory;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOTools;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
class homecontorel extends Controller
{
    /**
     * Display the homepage with SEO settings and products.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Set SEO data for the main page
        $this->seo()->setTitle('صفحه اصلی')
            ->setDescription('به صفحه اصلی خوش آمدید')
            ->opengraph()->setTitle('صفحه اصلی')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Fetch product categories (only parent categories)
        $categories = productcategory::all()->where('parent', 'LIKE', 0);

        // Fetch the latest 3 blog posts
        $blogs = blog::orderBy('failed_at')->limit(3)->get();




        // Fetch products by different conditions for the homepage display
        $count_view = Product::orderBy('count_view')->limit(4)->get();
        $pro = Product::where('Chosen', 1)->limit(4)->get();
        $special_sale = Product::where('Special_sale', 1)->limit(2)->get();
        $discounted = Product::where('discust', '>', 20)->limit(4)->get();

        // Return the homepage view with the fetched data
        return view('index', compact('pro', 'categories', 'blogs', 'discounted', 'count_view', 'special_sale'));
    }

    /**
     * Show the About Us page with relevant SEO data.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        // Set SEO data for the About Us page
        $this->seo()->setTitle('درباره ما')
            ->setDescription('درباره ما بیشتر بدانید')
            ->opengraph()->setTitle('درباره ما')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Return the About Us view
        return view('about');
    }

    /**
     * Show the blog list with SEO settings.
     *
     * @return \Illuminate\View\View
     */
    public function blog_list()
    {
        // Set SEO data for the Blog List page
        $this->seo()->setTitle('آرشیو مقالات')
            ->setDescription('آرشیو مقالات مشاهده کنید')
            ->opengraph()->setTitle('آرشیو مقالات')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Fetch the blogs from the database with pagination
        $blogs = blog::orderBy('failed_at')->paginate(6);

        // Return the blog view with the fetched blogs and additional data
        return view('blog', compact('blogs'))
            ->with('last_blog', TrendingContent::getTopViewed()[0]) // Adding the latest blog
            ->with('last_products', TrendingContent::getTopViewed()[1]); // Adding the latest products
    }

    /**
     * Display the Contact Us page with the necessary SEO data.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        // Log in a specific user (for demonstration purposes)
        Auth::loginUsingId(26);

        // Set SEO data for the Contact Us page
        $this->seo()->setTitle('تماس با ما')
            ->setDescription('پیشنهادات ، انتقادات و پیام های دیگر به ما بفرستید')
            ->opengraph()->setTitle('تماس با ما')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Return the Contact Us view
        return view('contact');
    }


    /**
     * Handle the submission of the contact form.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact_post(Request $request)
    {
        // Validate the input data from the contact form
        $data = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email'],
            'number_phone' => ['required'],
            'subject' => ['required','string'],
            'content' => ['required','string']
        ], [
            'name.required' => 'لطفاً نام خود را وارد کنید.',
            'email.required' => 'لطفاً ایمیل خود را وارد کنید.',
            'email.email' => 'ایمیل وارد شده صحیح نیست.',
            'number_phone.required' => 'لطفاً شماره تماس خود را وارد کنید.',
            'subject.required' => 'لطفاً موضوع پیام خود را وارد کنید.',
            'content.required' => 'لطفاً محتوای پیام خود را وارد کنید.'
        ]);

        // Create a new contact entry in the database
        $con = contacts::create($data);

        // Show success alert to the user
        Alert::success('ارسال موفیت آمیز بود', 'پیغام شما ارسال شد');

        // Redirect the user back to the previous page
        return back();
    }

    /**
     * Display the FAQ page.
     *
     * @return \Illuminate\View\View
     */
    public function faq()
    {
        // Set SEO data for the FAQ page
        $this->seo()->setTitle('سوالات متداول')
            ->setDescription('پاسخ سوالات خود را اینجا بیابید')
            ->opengraph()->setTitle('سوالات متداول')
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Return the FAQ view
        return view('faq');
    }

    /**
     * Display a single blog post along with its comments.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function blog_single(int $id)
    {
        // Find the blog post by its ID
        $blog = blog::find($id);

        // Set SEO data based on the blog post content
        $this->seo()->setTitle($blog->title)
            ->setDescription($blog->content)
            ->opengraph()->setTitle($blog->title)
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // Increment the blog's view count by 1
        $view = $blog->count_view + 1;
        $blog->update(['count_view' => $view]);

        // Get approved comments for the blog (root comments)
        $comments = $blog->comment()->where('status', 'LIKE', true)
            ->where('parent_id', 'LIKE', 0)
            ->get();

        // Return the blog post view with comments and additional data
        return view('blog-post', compact('blog', 'comments'))
            ->with('last_blog', TrendingContent::getTopViewed()[0])
            ->with('last_products', TrendingContent::getTopViewed()[1]);
    }

    /**
     * Display a product page along with its details and comments.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function product(int $id)
    {
        // Find the product by its ID
        $product = Product::find($id);

        // Set SEO data based on the product's name and description
        $this->seo()->setTitle($product->name)
            ->setDescription($product->discription)
            ->opengraph()->setTitle($product->name)
            ->addImage(asset('img/logo.png'), [
                'height' => 200,
                'width' => 200,
            ]);

        // If the product is not found, return a 404 error page
        if (is_null($product)) {
            return view('404');
        }

        // Increment the product's view count by 1
        $view = $product->count_view + 1;
        $product->update(['count_view' => $view]);

        // Get the product's category and associated products
        $category = $product->category()->get()->first();
        $category = $category->products()->get();

        // Get approved comments for the product (root comments)
        $comments = $product->comment()->where('status', 'LIKE', true)
            ->where('parent_id', 'LIKE', 0)
            ->get();

        // Get the current logged-in user
        $user = request()->user();

        // Return the product page view with the product details, comments, and category
        return view('product', compact('product', 'comments', 'category'));
    }
/**
 * Displays the user edit page with SEO and OpenGraph meta tags.
 */
public function edit_user() {
    // Set SEO title and description for the edit user page
    $this->seo()->setTitle('ویرایش اطلاعات')
        ->setDescription('اینجا میتوانید اطلاعت خود را ویرایش کنید')
        ->opengraph()->setTitle('ویرایش اطلاعات')
        // Add image for OpenGraph sharing
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);
    // Return the view for the edit user page
    return view('edit');
}

/**
 * Marks a selected address as the primary address for the user.
 */
public function selectadresses(int $id) {
    // Retrieve the address by its ID and user ID
    $address = adresse::where('id', $id)
        ->where('user_id', auth()->user()->id())
        ->first();

        // If the address exists, mark it as primary
        if ($address) {
            $address->selectAsPrimary();
            Auth::user()->orders()->wherestatus('unpaid')->update(['address_id'=>$address->id]);
    }

    // Redirect back to the previous page
    return redirect()->back();
}

/**
 * Handles the form submission for updating user information.
 */
public function edit_user_post(Request $request, int $id) {
    // Find the user by ID
    $user = User::find($id);
    Alert::
    // Validate the incoming request data
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'phonenumber' => ['required', 'max:13'],
        'meli_code' => ['required', 'max:10'],
        'image' => ['required'],
        'cart_number' => ['required', 'max:255'],
        'home_number' => ['required', 'max:11'],
        'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        'birthday' => ['required'],
    ], [
        // Custom error messages for validation
        'name.required' => 'لطفاً نام خود را وارد کنید.',
        'name.string' => 'نام باید یک رشته متنی باشد.',
        'name.max' => 'نام نباید بیش از ۲۵۵ کاراکتر باشد.',
        'phonenumber.required' => 'لطفاً شماره تلفن خود را وارد کنید.',
        'phonenumber.max' => 'شماره تلفن نباید بیش از 13 کاراکتر باشد.',
        'meli_code.required' => 'لطفاً کد ملی خود را وارد کنید.',
        'meli_code.max' => 'کد ملی نباید بیش از 10 کاراکتر باشد.',
        'image.required' => 'لطفاً تصویر خود را بارگذاری کنید.',
        'cart_number.required' => 'لطفاً شماره کارت بانکی خود را وارد کنید.',
        'cart_number.max' => 'شماره کارت نباید بیش از 12 کاراکتر باشد.',
        'home_number.required' => 'لطفاً شماره منزل خود را وارد کنید.',
        'home_number.max' => 'شماره منزل نباید بیش از 11 کاراکتر باشد.',
        'email.required' => 'لطفاً ایمیل خود را وارد کنید.',
        'email.email' => 'لطفاً یک آدرس ایمیل معتبر وارد کنید.',
        'email.max' => 'ایمیل نباید بیش از ۲۵۵ کاراکتر باشد.',
        'email.unique' => 'این ایمیل قبلاً ثبت شده است.',
        'birthday.required' => 'لطفاً تاریخ تولد خود را وارد کنید.',
    ]);

    // Store the uploaded image and get the file path
    $f = Storage::disk('public')->putFile('ProfilePhoto', request()->file('image'));
    $data['image'] = $f;

    // Update the user with the validated data
    $user->update($data);

    // Show a success alert after the update
    Alert::success('عملیات موفق آمیز بود', 'اطلاعات کاربری شما با موفق ویرایش شد');

    // Redirect to the personal information page
    return redirect()->route('personal');
}

/**
 * Displays the user's shopping cart.
 */
public function cart() {
    // Set SEO and OpenGraph meta tags for the cart page
    $this->seo()->setTitle('سبد خرید')
        ->setDescription('سبد خود را اینجا مشاهده کنید')
        ->opengraph()->setTitle('سبد خرید')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Return the view for the cart page
    return view('cart');
}

/**
 * Handles the submission of a new comment.
 */
public function craete_comment(Request $request) {
    // Validate the incoming request data for comment creation
    $data = $request->validate([
        'parent_id' => 'max:255',  // Optional parent comment ID
        'user_id' => 'required',   // User ID must be provided
        'commenttable_id' => 'required',  // ID of the table being commented on
        'commenttable_type' => 'required', // Type of the table being commented on
        'content' => 'required',   // Comment content must be provided
    ]);

    // Create a new comment in the database
    comment::create($data);

    // Show a success alert to the user
    Alert::success('نظر شما ارسال شد', 'دیدگاه شما پس از تائید نمایش داده خواهد شد');

    // Redirect back to the previous page
    return back();
}


/**
 * Handles the "like" action for a product by the authenticated user.
 * Adds the product to the user's list of favorites.
 */
public function like_post(Request $request) {
    // Find the product by its ID from the request
    $p = Product::find($request->product_id);

    // Attach the product to the authenticated user's favorites
    $request->user()->favorite()->attach($p);

    // Redirect back to the previous page
    return back();
}

/**
 * Handles the "dislike" action for a product by the authenticated user.
 * Removes the product from the user's list of favorites.
 */
public function dislike_post(Request $request) {
    // Find the product by its ID from the request
    $product = Product::find($request->product_id);

    // Detach the product from the authenticated user's favorites
    $request->user()->favorite()->detach($product);

    // Redirect back to the previous page
    return back();
}

/**
 * Allows the user to download a specific file (e.g., a resume).
 * Provides the file for download with appropriate headers.
 */
public function download() {
    // Define the file path for the resume
    $filePath = storage_path('app\files\MyResume-314[www.cvbuilder.me].pdf');

    // Return the file as a downloadable response with the specified headers
    return response()->download($filePath, 'MyResume', [
        'Content-Type' => 'application/pdf',  // Set the content type of the file
        'Cache-Control' => 'no-cache',        // Prevent caching of the file
    ]);
}

/**
 * Displays a list of blog posts for a specific category.
 * Sets up SEO and OpenGraph tags for the category page.
 */
public function blog_category(string $category) {
    // Set SEO and OpenGraph meta tags for the category page
    $this->seo()->setTitle('مقالات ' . $category)
        ->setDescription($category . ' مقالات دسته بندی')
        ->opengraph()->setTitle($category . ' مقالات')
        ->addImage(asset('img/logo.png'), [
            'height' => 200,
            'width' => 200,
        ]);

    // Retrieve the blog posts for the specified category, ordered by creation date
    $blogs = blogcategory::where('name', $category)
        ->first()
        ->blogs()
        ->orderBy('failed_at') // Assuming `failed_at` is the correct date column
        ->paginate(4);

    // Return the view for the blog category page with the list of blogs and additional data
    return view('blog', compact('blogs'))
        ->with('last_blog', TrendingContent::getTopViewed()[0])
        ->with('last_products', TrendingContent::getTopViewed()[1]);
}


}
