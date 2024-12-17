### Workflow
Implementing this logic is not too complex, but you can imagine that adding more rules would greatly increase the complexity. Instead of coding the logic ourselves, we can use the Symfony Workflow Component:
> symfony composer req workflow
> 
### Describing Workflows
To validate the workflow, generate a visual representation:
> symfony console workflow:dump comment | dot -Tpng -o workflow.png

> [!TIP] The dot command is a part of the [Graphviz](https://www.graphviz.org/) utility.

### Amin Email
For maximum compatibility with email readers, the notification base layout inlines all stylesheets (via the CSS inliner package) by default.

These two features are part of optional Twig extensions that need to be installed:
> symfony composer req "twig/cssinliner-extra:^3" "twig/inky-extra:^3"

