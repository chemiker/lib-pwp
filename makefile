build:
	mkdir lib
	mkdir lib/podlove-web-player
	wget https://github.com/podlove/podlove-web-player/archive/2.1.x.zip
	unzip -q 2.1.x.zip
	cd podlove-web-player-2.1.x/; \
	npm install gulp gulp-autoprefixer gulp-browserify gulp-cache gulp-clean gulp-compass gulp-concat gulp-connect gulp-imagemin gulp-jshint gulp-livereload gulp-minify-css gulp-notify gulp-rename gulp-ruby-sass gulp-sass gulp-uglify; \
	bower install; \
	gulp
	mv podlove-web-player-2.1.x/dist/ lib/podlove-web-player
	rm -rf 2.1.x.zip podlove-web-player-2.1.x/
