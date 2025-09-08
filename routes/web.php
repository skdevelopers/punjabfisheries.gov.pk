<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cms\CmsPageController;
use App\Http\Controllers\Cms\SliderController;
use App\Http\Controllers\FrontendController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes (Public)
Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/services', [FrontendController::class, 'services'])->name('frontend.services');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('/blogs', [FrontendController::class, 'blog'])->name('frontend.blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('frontend.blog.details');
Route::post('/blog/comment', [FrontendController::class, 'submitComment'])->name('frontend.blog.comment');
Route::get('/service/{slug}', [FrontendController::class, 'serviceDetails'])->name('frontend.service.details');
Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('frontend.page');
Route::middleware(['auth','verified'])->group(function (): void {
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'registerView'])->name('registerView');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [PagesController::class, 'dashboardsCrmAnalytics'])->name('index');
    Route::get('/dashboard', [PagesController::class, 'dashboardsCrmAnalytics'])->name('dashboard');

    Route::get('/elements/avatar', [PagesController::class, 'elementsAvatar'])->name('elements/avatar');
    Route::get('/elements/alert', [PagesController::class, 'elementsAlert'])->name('elements/alert');
    Route::get('/elements/button', [PagesController::class, 'elementsButton'])->name('elements/button');
    Route::get('/elements/button-group', [PagesController::class, 'elementsButtonGroup'])->name('elements/button-group');
    Route::get('/elements/badge', [PagesController::class, 'elementsBadge'])->name('elements/badge');
    Route::get('/elements/breadcrumb', [PagesController::class, 'elementsBreadcrumb'])->name('elements/breadcrumb');
    Route::get('/elements/card', [PagesController::class, 'elementsCard'])->name('elements/card');
    Route::get('/elements/divider', [PagesController::class, 'elementsDivider'])->name('elements/divider');
    Route::get('/elements/mask', [PagesController::class, 'elementsMask'])->name('elements/mask');
    Route::get('/elements/progress', [PagesController::class, 'elementsProgress'])->name('elements/progress');
    Route::get('/elements/skeleton', [PagesController::class, 'elementsSkeleton'])->name('elements/skeleton');
    Route::get('/elements/spinner', [PagesController::class, 'elementsSpinner'])->name('elements/spinner');
    Route::get('/elements/tag', [PagesController::class, 'elementsTag'])->name('elements/tag');
    Route::get('/elements/tooltip', [PagesController::class, 'elementsTooltip'])->name('elements/tooltip');
    Route::get('/elements/typography', [PagesController::class, 'elementsTypography'])->name('elements/typography');

    Route::get('/components/accordion', [PagesController::class, 'componentsAccordion'])->name('components/accordion');
    Route::get('/components/collapse', [PagesController::class, 'componentsCollapse'])->name('components/collapse');
    Route::get('/components/tab', [PagesController::class, 'componentsTab'])->name('components/tab');
    Route::get('/components/dropdown', [PagesController::class, 'componentsDropdown'])->name('components/dropdown');
    Route::get('/components/popover', [PagesController::class, 'componentsPopover'])->name('components/popover');
    Route::get('/components/modal', [PagesController::class, 'componentsModal'])->name('components/modal');
    Route::get('/components/drawer', [PagesController::class, 'componentsDrawer'])->name('components/drawer');
    Route::get('/components/steps', [PagesController::class, 'componentsSteps'])->name('components/steps');
    Route::get('/components/timeline', [PagesController::class, 'componentsTimeline'])->name('components/timeline');
    Route::get('/components/pagination', [PagesController::class, 'componentsPagination'])->name('components/pagination');
    Route::get('/components/menu-list', [PagesController::class, 'componentsMenuList'])->name('components/menu-list');
    Route::get('/components/treeview', [PagesController::class, 'componentsTreeview'])->name('components/treeview');
    Route::get('/components/table', [PagesController::class, 'componentsTable'])->name('components/table');
    Route::get('/components/table-advanced', [PagesController::class, 'componentsTableAdvanced'])->name('components/table-advanced');
    Route::get('/components/table-gridjs', [PagesController::class, 'componentsTableGridjs'])->name('components/gridjs');
    Route::get('/components/apexchart', [PagesController::class, 'componentsApexchart'])->name('components/apexchart');
    Route::get('/components/carousel', [PagesController::class, 'componentsCarousel'])->name('components/carousel');
    Route::get('/components/notification', [PagesController::class, 'componentsNotification'])->name('components/notification');
    Route::get('/components/extension-clipboard', [PagesController::class, 'componentsExtensionClipboard'])->name('components/extension-clipboard');
    Route::get('/components/extension-persist', [PagesController::class, 'componentsExtensionPersist'])->name('components/extension-persist');
    Route::get('/components/extension-monochrome', [PagesController::class, 'componentsExtensionMonochrome'])->name('components/extension-monochrome');

    Route::get('/forms/layout-v1', [PagesController::class, 'formsLayoutV1'])->name('forms/layout-v1');
    Route::get('/forms/layout-v2', [PagesController::class, 'formsLayoutV2'])->name('forms/layout-v2');
    Route::get('/forms/layout-v3', [PagesController::class, 'formsLayoutV3'])->name('forms/layout-v3');
    Route::get('/forms/layout-v4', [PagesController::class, 'formsLayoutV4'])->name('forms/layout-v4');
    Route::get('/forms/layout-v5', [PagesController::class, 'formsLayoutV5'])->name('forms/layout-v5');

    // Profile Navigation Routes
    Route::get('/profile', [PagesController::class, 'profile'])->name('profile');
    Route::get('/messages', [PagesController::class, 'messages'])->name('messages');
    Route::get('/team', [PagesController::class, 'team'])->name('team');
    Route::get('/activity', [PagesController::class, 'activity'])->name('activity');
    Route::get('/settings', [PagesController::class, 'settings'])->name('settings');

    Route::get('/forms/input-text', [PagesController::class, 'formsInputText'])->name('forms/input-text');
    Route::get('/forms/input-group', [PagesController::class, 'formsInputGroup'])->name('forms/input-group');
    Route::get('/forms/input-mask', [PagesController::class, 'formsInputMask'])->name('forms/input-mask');
    Route::get('/forms/checkbox', [PagesController::class, 'formsCheckbox'])->name('forms/checkbox');
    Route::get('/forms/radio', [PagesController::class, 'formsRadio'])->name('forms/radio');
    Route::get('/forms/switch', [PagesController::class, 'formsSwitch'])->name('forms/switch');
    Route::get('/forms/select', [PagesController::class, 'formsSelect'])->name('forms/select');
    Route::get('/forms/tom-select', [PagesController::class, 'formsTomSelect'])->name('forms/tom-select');
    Route::get('/forms/textarea', [PagesController::class, 'formsTextarea'])->name('forms/textarea');
    Route::get('/forms/range', [PagesController::class, 'formsRange'])->name('forms/range');
    Route::get('/forms/datepicker', [PagesController::class, 'formsDatepicker'])->name('forms/datepicker');
    Route::get('/forms/timepicker', [PagesController::class, 'formsTimepicker'])->name('forms/timepicker');
    Route::get('/forms/datetimepicker', [PagesController::class, 'formsDatetimepicker'])->name('forms/datetimepicker');
    Route::get('/forms/text-editor', [PagesController::class, 'formsTextEditor'])->name('forms/text-editor');
    Route::get('/forms/upload', [PagesController::class, 'formsUpload'])->name('forms/upload');
    Route::get('/forms/validation', [PagesController::class, 'formsValidation'])->name('forms/validation');

    Route::get('/layouts/onboarding-1', [PagesController::class, 'layoutsOnboarding1'])->name('layouts/onboarding-1');
    Route::get('/layouts/onboarding-2', [PagesController::class, 'layoutsOnboarding2'])->name('layouts/onboarding-2');
    Route::get('/layouts/user-card-1', [PagesController::class, 'layoutsUserCard1'])->name('layouts/user-card-1');
    Route::get('/layouts/user-card-2', [PagesController::class, 'layoutsUserCard2'])->name('layouts/user-card-2');
    Route::get('/layouts/user-card-3', [PagesController::class, 'layoutsUserCard3'])->name('layouts/user-card-3');
    Route::get('/layouts/user-card-4', [PagesController::class, 'layoutsUserCard4'])->name('layouts/user-card-4');
    Route::get('/layouts/user-card-5', [PagesController::class, 'layoutsUserCard5'])->name('layouts/user-card-5');
    Route::get('/layouts/user-card-6', [PagesController::class, 'layoutsUserCard6'])->name('layouts/user-card-6');
    Route::get('/layouts/user-card-7', [PagesController::class, 'layoutsUserCard7'])->name('layouts/user-card-7');
    Route::get('/layouts/blog-card-1', [PagesController::class, 'layoutsBlogCard1'])->name('layouts/blog-card-1');
    Route::get('/layouts/blog-card-2', [PagesController::class, 'layoutsBlogCard2'])->name('layouts/blog-card-2');
    Route::get('/layouts/blog-card-3', [PagesController::class, 'layoutsBlogCard3'])->name('layouts/blog-card-3');
    Route::get('/layouts/blog-card-4', [PagesController::class, 'layoutsBlogCard4'])->name('layouts/blog-card-4');
    Route::get('/layouts/blog-card-5', [PagesController::class, 'layoutsBlogCard5'])->name('layouts/blog-card-5');
    Route::get('/layouts/blog-card-6', [PagesController::class, 'layoutsBlogCard6'])->name('layouts/blog-card-6');
    Route::get('/layouts/blog-card-7', [PagesController::class, 'layoutsBlogCard7'])->name('layouts/blog-card-7');
    Route::get('/layouts/blog-card-8', [PagesController::class, 'layoutsBlogCard8'])->name('layouts/blog-card-8');
    Route::get('/layouts/blog-details', [PagesController::class, 'layoutsBlogDetails'])->name('layouts/blog-details');
    Route::get('/layouts/help-1', [PagesController::class, 'layoutsHelp1'])->name('layouts/help-1');
    Route::get('/layouts/help-2', [PagesController::class, 'layoutsHelp2'])->name('layouts/help-2');
    Route::get('/layouts/help-3', [PagesController::class, 'layoutsHelp3'])->name('layouts/help-3');
    Route::get('/layouts/price-list-1', [PagesController::class, 'layoutsPriceList1'])->name('layouts/price-list-1');
    Route::get('/layouts/price-list-2', [PagesController::class, 'layoutsPriceList2'])->name('layouts/price-list-2');
    Route::get('/layouts/price-list-3', [PagesController::class, 'layoutsPriceList3'])->name('layouts/price-list-3');
    Route::get('/layouts/price-list-4', [PagesController::class, 'layoutsPriceList4'])->name('layouts/price-list-4');
    Route::get('/layouts/invoice-1', [PagesController::class, 'layoutsInvoice1'])->name('layouts/invoice-1');
    Route::get('/layouts/invoice-2', [PagesController::class, 'layoutsInvoice2'])->name('layouts/invoice-2');
    Route::get('/layouts/sign-in-1', [PagesController::class, 'layoutsSignIn1'])->name('layouts/sign-in-1');
    Route::get('/layouts/sign-in-2', [PagesController::class, 'layoutsSignIn2'])->name('layouts/sign-in-2');
    Route::get('/layouts/sign-up-1', [PagesController::class, 'layoutsSignUp1'])->name('layouts/sign-up-1');
    Route::get('/layouts/sign-up-2', [PagesController::class, 'layoutsSignUp2'])->name('layouts/sign-up-2');
    Route::get('/layouts/error-404-1', [PagesController::class, 'layoutsError4041'])->name('layouts/error-404-1');
    Route::get('/layouts/error-404-2', [PagesController::class, 'layoutsError4042'])->name('layouts/error-404-2');
    Route::get('/layouts/error-404-3', [PagesController::class, 'layoutsError4043'])->name('layouts/error-404-3');
    Route::get('/layouts/error-404-4', [PagesController::class, 'layoutsError4044'])->name('layouts/error-404-4');
    Route::get('/layouts/error-401', [PagesController::class, 'layoutsError401'])->name('layouts/error-401');
    Route::get('/layouts/error-429', [PagesController::class, 'layoutsError429'])->name('layouts/error-429');
    Route::get('/layouts/error-500', [PagesController::class, 'layoutsError500'])->name('layouts/error-500');
    Route::get('/layouts/starter-blurred-header', [PagesController::class, 'layoutsStarterBlurredHeader'])->name('layouts/starter-blurred-header');
    Route::get('/layouts/starter-unblurred-header', [PagesController::class, 'layoutsStarterUnblurredHeader'])->name('layouts/starter-unblurred-header');
    Route::get('/layouts/starter-centered-link', [PagesController::class, 'layoutsStarterCenteredLink'])->name('layouts/starter-centered-link');
    Route::get('/layouts/starter-minimal-sidebar', [PagesController::class, 'layoutsStarterMinimalSidebar'])->name('layouts/starter-minimal-sidebar');
    Route::get('/layouts/starter-sideblock', [PagesController::class, 'layoutsStarterSideblock'])->name('layouts/starter-sideblock');

    Route::get('/apps/chat', [PagesController::class, 'appsChat'])->name('apps/chat');
    Route::get('/apps/ai-chat', [PagesController::class, 'appsAiChat'])->name('apps/ai-chat');
    Route::get('/apps/filemanager', [PagesController::class, 'appsFilemanager'])->name('apps/filemanager');
    Route::get('/apps/kanban', [PagesController::class, 'appsKanban'])->name('apps/kanban');
    Route::get('/apps/list', [PagesController::class, 'appsList'])->name('apps/list');
    Route::get('/apps/mail', [PagesController::class, 'appsMail'])->name('apps/mail');
    Route::get('/apps/nft-1', [PagesController::class, 'appsNft1'])->name('apps/nft1');
    Route::get('/apps/nft-2', [PagesController::class, 'appsNft2'])->name('apps/nft2');
    Route::get('/apps/pos', [PagesController::class, 'appsPos'])->name('apps/pos');
    Route::get('/apps/todo', [PagesController::class, 'appsTodo'])->name('apps/todo');
    Route::get('/apps/jobs-board', [PagesController::class, 'appsJobsBoard'])->name('apps/jobs-board');
    Route::get('/apps/travel', [PagesController::class, 'appsTravel'])->name('apps/travel');

    Route::get('/dashboards/crm-analytics', [PagesController::class, 'dashboardsCrmAnalytics'])->name('dashboards/crm-analytics');
    Route::get('/dashboards/orders', [PagesController::class, 'dashboardsOrders'])->name('dashboards/orders');
    Route::get('/dashboards/crypto-1', [PagesController::class, 'dashboardsCrypto1'])->name('dashboards/crypto-1');
    Route::get('/dashboards/crypto-2', [PagesController::class, 'dashboardsCrypto2'])->name('dashboards/crypto-2');
    Route::get('/dashboards/banking-1', [PagesController::class, 'dashboardsBanking1'])->name('dashboards/banking-1');
    Route::get('/dashboards/banking-2', [PagesController::class, 'dashboardsBanking2'])->name('dashboards/banking-2');
    Route::get('/dashboards/personal', [PagesController::class, 'dashboardsPersonal'])->name('dashboards/personal');
    Route::get('/dashboards/cms-analytics', [PagesController::class, 'dashboardsCmsAnalytics'])->name('dashboards/cms-analytics');
    Route::get('/dashboards/influencer', [PagesController::class, 'dashboardsInfluencer'])->name('dashboards/influencer');
    Route::get('/dashboards/travel', [PagesController::class, 'dashboardsTravel'])->name('dashboards/travel');
    Route::get('/dashboards/teacher', [PagesController::class, 'dashboardsTeacher'])->name('dashboards/teacher');
    Route::get('/dashboards/education', [PagesController::class, 'dashboardsEducation'])->name('dashboards/education');
    Route::get('/dashboards/authors', [PagesController::class, 'dashboardsAuthors'])->name('dashboards/authors');
    Route::get('/dashboards/doctor', [PagesController::class, 'dashboardsDoctor'])->name('dashboards/doctor');
    Route::get('/dashboards/employees', [PagesController::class, 'dashboardsEmployees'])->name('dashboards/employees');
    Route::get('/dashboards/workspaces', [PagesController::class, 'dashboardsWorkspaces'])->name('dashboards/workspaces');
    Route::get('/dashboards/meetings', [PagesController::class, 'dashboardsMeetings'])->name('dashboards/meetings');
    Route::get('/dashboards/project-boards', [PagesController::class, 'dashboardsProjectBoards'])->name('dashboards/project-boards');
    Route::get('/dashboards/widget-ui', [PagesController::class, 'dashboardsWidgetUi'])->name('dashboards/widget-ui');
    Route::get('/dashboards/widget-contacts', [PagesController::class, 'dashboardsWidgetContacts'])->name('dashboards/widget-contacts');

    // CMS Routes
    Route::prefix('cms')->name('cms.')->group(function () {
        Route::get('/', [CmsPageController::class, 'index'])->name('index');
        Route::get('/pages', [CmsPageController::class, 'pages'])->name('pages');
        Route::get('/pages/create', [CmsPageController::class, 'createPage'])->name('pages.create');
        Route::post('/pages', [CmsPageController::class, 'storePage'])->name('pages.store');
        Route::get('/pages/{id}/edit', [CmsPageController::class, 'editPage'])->name('pages.edit');
        Route::put('/pages/{id}', [CmsPageController::class, 'updatePage'])->name('pages.update');
        Route::delete('/pages/{id}', [CmsPageController::class, 'deletePage'])->name('pages.delete');
        Route::get('/media', [CmsPageController::class, 'media'])->name('media');
        Route::post('/media/upload', [CmsPageController::class, 'uploadMedia'])->name('media.upload');

        // Slider Management Routes
        Route::get('/sliders', [SliderController::class, 'index'])->name('sliders.index');
        Route::get('/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
        Route::post('/sliders', [SliderController::class, 'store'])->name('sliders.store');
        Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
        Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
        Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
        Route::patch('/sliders/{id}/toggle-status', [SliderController::class, 'toggleStatus'])->name('sliders.toggle-status');
        Route::post('/sliders/reorder', [SliderController::class, 'reorder'])->name('sliders.reorder');

        // Blog Management Routes
        Route::resource('blog', \App\Http\Controllers\Cms\BlogController::class);
        Route::patch('/blog/{blog}/toggle-featured', [\App\Http\Controllers\Cms\BlogController::class, 'toggleFeatured'])->name('blog.toggle-featured');
        Route::patch('/blog/{blog}/toggle-publish', [\App\Http\Controllers\Cms\BlogController::class, 'togglePublish'])->name('blog.toggle-publish');
        Route::get('/blog/preview', [\App\Http\Controllers\Cms\BlogController::class, 'preview'])->name('blog.preview');

        // Blog Categories Management Routes
        Route::resource('blog-categories', \App\Http\Controllers\Cms\BlogCategoryController::class);
        Route::patch('/blog-categories/{blogCategory}/toggle-status', [\App\Http\Controllers\Cms\BlogCategoryController::class, 'toggleStatus'])->name('blog-categories.toggle-status');
        Route::post('/blog-categories/reorder', [\App\Http\Controllers\Cms\BlogCategoryController::class, 'reorder'])->name('blog-categories.reorder');

        // Blog Tags Management Routes
        Route::resource('blog-tags', \App\Http\Controllers\Cms\BlogTagController::class);
        Route::patch('/blog-tags/{blogTag}/toggle-status', [\App\Http\Controllers\Cms\BlogTagController::class, 'toggleStatus'])->name('blog-tags.toggle-status');

        // Blog Comments Management Routes
        Route::resource('blog-comments', \App\Http\Controllers\Cms\BlogCommentController::class);
        Route::patch('/blog-comments/{blogComment}/approve', [\App\Http\Controllers\Cms\BlogCommentController::class, 'approve'])->name('blog-comments.approve');
        Route::patch('/blog-comments/{blogComment}/spam', [\App\Http\Controllers\Cms\BlogCommentController::class, 'markAsSpam'])->name('blog-comments.spam');
        Route::post('/blog-comments/bulk-action', [\App\Http\Controllers\Cms\BlogCommentController::class, 'bulkAction'])->name('blog-comments.bulk-action');

        // Hatchery Management Routes
        Route::resource('hatcheries', \App\Http\Controllers\HatcheryController::class);

        // Fish Production Management Routes
        Route::resource('fish-productions', \App\Http\Controllers\FishProductionController::class);
        
        // Seed Production Management Routes
        Route::resource('seed-productions', \App\Http\Controllers\SeedProductionController::class);
    });
});
