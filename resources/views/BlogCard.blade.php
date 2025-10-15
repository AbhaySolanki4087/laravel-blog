  <section class="py-5">
    <div class="container">
      <div class="row g-4">

        <!-- Blog Posts -->
        <div class="col-lg-8">
          <div class="row g-4">
@if($blogs->count() > 0)
        @foreach($blogs as $blog)

            <!-- Blog Card 1 -->
            <div class="col-md-6">
              <div class="card blog-card shadow-sm border-0">
                <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog 1">
                <div class="card-body">
                  <h5 class="card-title">{{$blog->title}}</h5>
                  <p class="card-text text-muted">{{ Str::limit($blog->content, 100) }}</p>
                  <a href="{{ route('blog.read', $blog->id) }}" class="btn btn-primary btn-sm">Read More</a>
                </div>
              </div>
            </div>
        @endforeach
@else
            <!-- Blog Card 1 -->
            <div class="col-md-6">
              <div class="card blog-card shadow-sm border-0">
                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Blog 1">
                <div class="card-body">
                  <h5 class="card-title">Exploring the Mountains</h5>
                  <p class="card-text text-muted">Discover the beauty and peace hidden in the high peaks of nature.</p>
                  <a href="#" class="btn btn-primary btn-sm">Read More</a>
                </div>
              </div>
            </div>
            <!-- Blog Card 2 -->
            <div class="col-md-6">
              <div class="card blog-card shadow-sm border-0">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Blog 2">
                <div class="card-body">
                  <h5 class="card-title">Tech Trends in 2025</h5>
                  <p class="card-text text-muted">A look at the most exciting innovations shaping our future.</p>
                  <a href="#" class="btn btn-primary btn-sm">Read More</a>
                </div>
              </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="col-md-6">
              <div class="card blog-card shadow-sm border-0">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Blog 3">
                <div class="card-body">
                  <h5 class="card-title">Mindful Living</h5>
                  <p class="card-text text-muted">Learn how mindfulness can improve focus, health, and happiness.</p>
                  <a href="#" class="btn btn-primary btn-sm">Read More</a>
                </div>
              </div>
            </div>

            <!-- Blog Card 4 -->
            <div class="col-md-6">
              <div class="card blog-card shadow-sm border-0">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Blog 4">
                <div class="card-body">
                  <h5 class="card-title">Building a Startup</h5>
                  <p class="card-text text-muted">The journey from an idea to a successful business model.</p>
                  <a href="#" class="btn btn-primary btn-sm">Read More</a>
                </div>
              </div>
            </div>
@endif
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
          <!-- Search -->
          <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">Search</h5>
              <form action="/search" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" name="query" class="form-control" placeholder="Search posts...">
                    <button class="btn btn-dark">Go</button>
                  </div>
              </form>
            </div>
          </div>

          <!-- Categories -->
          <!-- <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              <ul class="list-unstyled mb-0">
                <li><a href="#" class="text-decoration-none">Travel</a></li>
                <li><a href="#" class="text-decoration-none">Technology</a></li>
                <li><a href="#" class="text-decoration-none">Lifestyle</a></li>
                <li><a href="#" class="text-decoration-none">Health</a></li>
              </ul>
            </div>
          </div> -->

          <!-- Tags -->
          <!-- <div class="card shadow-sm border-0">
            <div class="card-body">
              <h5 class="card-title">Tags</h5>
              <div>
                <span class="badge bg-secondary">Design</span>
                <span class="badge bg-secondary">Travel</span>
                <span class="badge bg-secondary">Startup</span>
                <span class="badge bg-secondary">Tech</span>
                <span class="badge bg-secondary">Health</span>
              </div>
            </div>
          </div> -->

        </div>

      </div>
    </div>
  </section>