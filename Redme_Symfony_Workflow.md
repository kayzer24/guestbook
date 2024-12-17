### Workflow
Implementing this logic is not too complex, but you can imagine that adding more rules would greatly increase the complexity. Instead of coding the logic ourselves, we can use the Symfony Workflow Component:
> symfony composer req workflow
> 
### Describing Workflows
To validate the workflow, generate a visual representation:
> symfony console workflow:dump comment | dot -Tpng -o workflow.png

> [!TIP] The dot command is a part of the [Graphviz](https://www.graphviz.org/) utility.