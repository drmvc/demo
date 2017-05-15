all:
	make composer
	make bower
	make styles

composer:
	composer update

bower:
	bower update

styles:
	find public/css -name "*.scss" | \
	    while read style; \
	        do \
	            scss --style compressed $$style > `dirname $$style`/`basename $$style .scss`.css; \
	    done
