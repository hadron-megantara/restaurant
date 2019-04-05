@if($user = Auth::user())
<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								&copy; <a href="index.html" class="text-muted">Restaurant</a>
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="/about-us">About us</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="/help">Help</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="/contact-us">Contact</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="/terms-conditions">Terms & Conditions</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
@endif
