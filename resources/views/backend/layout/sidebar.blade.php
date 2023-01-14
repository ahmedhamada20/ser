<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{ route('dashboard') }}">
            <img src="{{asset('backend/assets/images/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{asset('backend/assets/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{asset('backend/assets/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{asset('backend/assets/images/brand/logo-3.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3></h3></li>
        <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="{{ route('dashboard') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">لوحة التحكم</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="{{ route('quiz') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">الأستقصاء</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="{{ route('type') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">نوع سؤال</span></a>
        </li>
 <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="{{ route('question') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">الاسئله</span></a>
        </li>

        {{-- <li class="slide">
            <a class="side-menu__item"  data-bs-toggle="slide" href="{{ route('answer') }}"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">الاجابه</span></a>
        </li> --}}


{{--    --}}
       <li class="slide">
           <a class="side-menu__item" data-bs-toggle="slide" href="#"><i class="side-menu__icon fe fe-command"></i><span class="side-menu__label"> الأستقصاء</span><i class="angle fa fa-angle-left"></i></a>
           <ul class="slide-menu">
            @foreach (App\Models\Quizze::get() as $quizze )
            <li><a href="{{ route('pages' ,$quizze->id) }}" class="slide-item"> {{ $quizze->name }}</a></li>
            @endforeach
               
           </ul>
       </li>

    </ul>
</aside>
<!--/APP-SIDEBAR-->
