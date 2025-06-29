@extends('layouts.app')

@section('title', '| Home')

@section('content')
    

<section class= "hero-section-top" id="heroSection">
    <div class="hero-content-wrapper">
        <div class="hero-section" id="heroImageSection">
            <div class="background-overlay"></div>
            <img src="{{ asset('images/potrait1.png') }}" alt="Irwan Saputra" class="hero-image">
        </div>
        <p class="hero-text">
            Informatics Engineer & UI/UX Enthusiast, building solutions that blend aesthetics with function 
        </p>
        <a href="#myworkSection" class="hero-cta-button">See My Work</a>
    </div>
</section>
<section class= "about-section" id="aboutSection">
    <div class="about-content">
            <div class="about-image-placeholder"></div>
            <div class="about-text-content">
                <h1>Hi!, I'm Irwan Saputra</h1>
                <p>I'm a Computer Science student at Raja Ali Haji Maritime University with a strong interest in design and technical execution. I see design as the crucial link that bridges abstract concepts to engaging and practical visuals. My commitment lies in developing digital experiences that are not just beautiful, but also incredibly intuitive and effective, ensuring an outstanding user journey.</p>
                <a href="#contactSection" class="about-cta-button">Let's Talk!</a>
            </div>
        </div>
</section>
<section class= "mywork-section" id="myworkSection">
    <div class="mywork-content">
        <div>
            <div class="circle1"></div>
            <div class="circle2"></div>
        </div>
        <div class="mywork-header">
            <p>Recent Work</p>
            <a href="{{ route('works.all') }}" class="seemore-btn">
                See more
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29" fill="none">
                    <path d="M8.16602 20.3346L19.8327 8.66797M19.8327 8.66797H8.16602M19.8327 8.66797V20.3346" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
        <div class="work-list">
            @if (!empty($works) && count($works) > 0) {{-- Check if $works is not empty --}}
                @foreach ($works->take(4) as $work) {{-- Use take(4) to get only the first 4 items --}}
                    @include('partials.card', ['work' => $work]) {{-- Pass the current $work item to the partial --}}
                @endforeach
            @else
                <p class="text-center w-full">No work items to display yet. Check back soon!</p>
            @endif
        </div>
    </div>
</section>

 <section class="skills-section" id="skillsSection">
        <h2 class="skills-heading">My Expertise</h2>
        <div class="skills-grid">
            @forelse ($skills as $skill)
                <div class="skill-item">
                    <span class="skill-name">{{ $skill->name }}</span>
                    @if ($skill->proficiency !== null)
                        <div class="proficiency-bar">
                            <div class="proficiency-level" style="width: {{ $skill->proficiency }}%;"></div>
                        </div>
                        <span class="proficiency-percentage">{{ $skill->proficiency }}%</span>
                    @else
                        <span class="proficiency-percentage">N/A</span>
                    @endif
                </div>
            @empty
                <p class="no-skills">No skills added yet.</p>
            @endforelse
        </div>
    </section>

<section class="blog-section" id="blogSection">
        <div class="blog-section-header">
            <span class="blog-heading-prefix">-blog</span>
            <h2 class="blog-heading">What's new? <br>My blog and news.</h2>
        </div>
        <div class="blog-list-container">
            @forelse ($blogs as $blog)
                <div class="blog-list-item">
                    <span class="blog-date">{{ $blog->created_at->format('M d') }}</span>
                    <p class="blog-title-excerpt">{{ Str::limit($blog->title, 70, '...') }}</p>
                    <a href="#" class="blog-read-more-arrow">
                        <!-- SVG for arrow icon -->
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4L10.59 5.41L16.17 11H4V13H16.17L10.59 18.59L12 20L20 12L12 4Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            @empty
                <p class="no-blog-posts">No blog posts available yet. Check back soon!</p>
            @endforelse

            <div class="blog-pagination">
                <button class="pagination-button prev disabled">Prev</button>
                <button class="pagination-button next">Next</button>
            </div>
        </div>
    </section>

<section class="contact-section" id="contactSection">
        <div class="contact-info-panel">
            <div class="contact-profile-image"></div>
            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34" fill="none">
                        <g clip-path="url(#clip0_334_740)">
                            <path d="M24.7923 9.20703H24.8065M9.91732 2.83203H24.084C27.996 2.83203 31.1673 6.00335 31.1673 9.91536V24.082C31.1673 27.994 27.996 31.1654 24.084 31.1654H9.91732C6.0053 31.1654 2.83398 27.994 2.83398 24.082V9.91536C2.83398 6.00335 6.0053 2.83203 9.91732 2.83203ZM22.6673 16.1062C22.8422 17.2852 22.6408 18.4893 22.0918 19.5473C21.5429 20.6053 20.6743 21.4632 19.6096 21.9991C18.545 22.5349 17.3385 22.7215 16.1617 22.5321C14.9849 22.3427 13.8978 21.7871 13.055 20.9443C12.2122 20.1015 11.6566 19.0144 11.4672 17.8377C11.2779 16.6609 11.4644 15.4544 12.0003 14.3897C12.5361 13.3251 13.3941 12.4565 14.452 11.9075C15.51 11.3586 16.7141 11.1572 17.8932 11.332C19.0958 11.5104 20.2092 12.0708 21.0689 12.9305C21.9286 13.7902 22.489 14.9036 22.6673 16.1062Z" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_334_740">
                            <rect width="34" height="34" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" class="social-icon" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                        <g clip-path="url(#clip0_334_2313)">
                            <path d="M26.125 0H6.875C3.07863 0 0 3.07863 0 6.875V26.125C0 29.9214 3.07863 33 6.875 33H26.125C29.9228 33 33 29.9214 33 26.125V6.875C33 3.07863 29.9228 0 26.125 0ZM11 26.125H6.875V11H11V26.125ZM8.9375 9.2565C7.60925 9.2565 6.53125 8.17025 6.53125 6.831C6.53125 5.49175 7.60925 4.4055 8.9375 4.4055C10.2657 4.4055 11.3438 5.49175 11.3438 6.831C11.3438 8.17025 10.2671 9.2565 8.9375 9.2565ZM27.5 26.125H23.375V18.4195C23.375 13.7885 17.875 14.1391 17.875 18.4195V26.125H13.75V11H17.875V13.4269C19.7945 9.87113 27.5 9.6085 27.5 16.8314V26.125Z" fill="#1E1E1E"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_334_2313">
                            <rect width="33" height="33" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" class="social-icon" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33" fill="none">
                        <g clip-path="url(#clip0_334_2589)">
                            <path d="M12.375 26.1267C5.5 28.1892 5.5 22.6892 2.75 22.0017M22 30.2517V24.9304C22.0516 24.2748 21.963 23.6157 21.7401 22.9969C21.5173 22.3781 21.1653 21.8139 20.7075 21.3417C25.025 20.8604 29.5625 19.2242 29.5625 11.7167C29.5621 9.79695 28.8237 7.95083 27.5 6.56043C28.1268 4.88088 28.0825 3.02441 27.3762 1.37668C27.3762 1.37668 25.7538 0.895434 22 3.41168C18.8485 2.55756 15.5265 2.55756 12.375 3.41168C8.62125 0.895434 6.99875 1.37668 6.99875 1.37668C6.29252 3.02441 6.2482 4.88088 6.875 6.56043C5.54142 7.96115 4.80222 9.82395 4.8125 11.7579C4.8125 19.2104 9.35 20.8467 13.6675 21.3829C13.2151 21.8504 12.8662 22.4079 12.6435 23.0191C12.4209 23.6303 12.3294 24.2815 12.375 24.9304V30.2517" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_334_2589">
                            <rect width="33" height="33" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>

        <div class="contact-form-panel">
            <div class="contact-heading">Got a project? <br>Let me know you are here.</div>
            {{-- Session Flash Message for Success/Error --}}
            @if (Session::has('success_contact'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success_contact') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Please correct the errors below.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="sender_name" class="form-label">What's your name?</label>
                    <input type="text" class="form-control @error('sender_name') is-invalid @enderror" id="sender_name" name="sender_name" value="{{ old('sender_name') }}" required>
                    @error('sender_name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sender_email" class="form-label">Your email?</label>
                    <input type="email" class="form-control @error('sender_email') is-invalid @enderror" id="sender_email" name="sender_email" value="{{ old('sender_email') }}" required>
                    @error('sender_email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="request_type" class="form-label">Any request?</label>
                    <select class="form-select @error('request_type') is-invalid @enderror" id="request_type" name="request_type" required>
                        <option value="" disabled {{ old('request_type') == '' ? 'selected' : '' }}>See your needs!</option>
                        <option value="Hourly" {{ old('request_type') == 'Hourly' ? 'selected' : '' }}>Hourly</option>
                        <option value="Project" {{ old('request_type') == 'Project' ? 'selected' : '' }}>Project</option>
                        <option value="Period contract" {{ old('request_type') == 'Period contract' ? 'selected' : '' }}>Period contract</option>
                        <option value="Just want to say hi" {{ old('request_type') == 'Just want to say hi' ? 'selected' : '' }}>Just want to say hi</option>
                    </select>
                    @error('request_type')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Tell me more about your brilliant idea</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="contact-cta-button">Send Message</button> 
            </form>
        </div>
    </section>
@endsection