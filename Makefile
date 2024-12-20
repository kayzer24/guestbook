SHELL := /bin/bash

tests:
	symfony console d:d:d -f --env=test || true
	symfony console d:d:c --env=test
	symfony console d:m:m -n --env=test
	symfony console d:f:l -n --env=test
	symfony php bin/phpunit $(MAKECMDGOALS)
.PHONY: tests