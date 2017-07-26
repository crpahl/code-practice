<?php

require_once 'vendor/autoload.php';

use \Fhaculty\Graph\Graph as Graph;

/**
 * Construct a directed graph from the given triplets. For each triplet,
 * a vertex will be created for each character in the triplet with an edge
 * between each of the characters. For example, for a triplet [t1, t2, t3]
 * the following will be added to the graph:
 *
 * t1 -> t2 -> t3
 *
 * Issues with this solution:
 *
 * A solution will currently only be found if the given triplets form a
 * complete path from the first character to the last character which
 * contains all characters in the secret word.
 *
 * There might be a dynamic programming approach that will allow me to
 * retrieve the solution when the path is not complete.
 *
 * Class SecretStringSolver
 */
class GraphStringSolver
{
    private $triplets;
    private $directedCharacterGraph;
    private $wordLength;
    private $solution;

    public function recoverSecret($triplets)
    {
        $this->solution = 'Secret Not Found';
        $this->triplets = $triplets;
        $this->directedCharacterGraph = new Graph();
        $this->wordLength = $this->getSecretLength($triplets);
        
        $this->solve();
        
        return $this->solution;
    }

    /**
     * Find the length of the secret based on the given triplets by counting
     * unique characters
     *
     * @param $triplets
     * @return int
     */
    private function getSecretLength($triplets)
    {
        $characters = [];
        foreach ($triplets as $triplet) {
            foreach ($triplet as $character) {
                $characters[$character] = 1;
            }
        }

        return count($characters);
    }

    /**
     * Attempt to solve the solve the solution by creating a directed graph
     * of linked characters. The root of the graph will always be the first
     * character in the secret word. After the directed graph is created,
     * we will traverse all paths from the root node to the leaf node
     * which will be the last character in the secret word assuming we
     * were given valid information in the triplets
     */
    private function solve()
    {
        $this->createDirectedGraph();
        $firstCharacterVertex = $this->getFirstCharacterVertex();
        
        if (is_null($firstCharacterVertex)) {
            return;
        }
        
        $this->findSolutionIfExists($firstCharacterVertex, [], 0);
    }

    /**
     * Create a directed graph of connected characters by iterating
     * through all triplets
     */
    private function createDirectedGraph()
    {
        foreach($this->triplets as $triplet) {
            $this->addTripletToCharacterGraph($triplet);
        }
    }

    private function addTripletToCharacterGraph($triplet)
    {
        $vertex1 = $this->createVertexIfNeeded($triplet[0]);
        $vertex2 = $this->createVertexIfNeeded($triplet[1]);
        $vertex3 = $this->createVertexIfNeeded($triplet[2]);

        $this->addEdgeIfNeeded($vertex1, $vertex2);
        $this->addEdgeIfNeeded($vertex2, $vertex3);
    }

    /**
     * Find the first character in the solution. This will always be the
     * root node in the directed graph
     *
     * @return null|\Fhaculty\Graph\Vertex
     */
    private function getFirstCharacterVertex() {
        foreach($this->directedCharacterGraph->getVertices() as $vertex) {
            if(count($vertex->getEdgesIn()) === 0) {
                return $vertex;
            }
        }

        return null;
    }

    private function createVertexIfNeeded($character)
    {
        if ($this->directedCharacterGraph->hasVertex($character)) {
            return $this->directedCharacterGraph->getVertex($character);
        }

        return $this->directedCharacterGraph->createVertex($character);
    }

    /**
     * @param \Fhaculty\Graph\Vertex $vertex1
     * @param \Fhaculty\Graph\Vertex $vertex2
     */
    private function addEdgeIfNeeded($vertex1, $vertex2)
    {
        if (!$vertex1->hasEdgeTo($vertex2)) {
            $vertex1->createEdgeTo($vertex2);
        }
    }

    /**
     * Traverse all paths from the root node to the leaf node.
     * The last character in the secret word will always be the leaf node
     * (no outgoing edges)
     *
     * @param \Fhaculty\Graph\Vertex $vertex
     * @param array $path
     * @param $arrayCounter
     */
    private function findSolutionIfExists($vertex, Array $path, $arrayCounter)
    {
        $path[$arrayCounter++] = $vertex->getId();

        if ($this->hasSolution($vertex, $path)) {
            $this->solution = implode('', $path);
        }

        else {
            foreach ($vertex->getVerticesEdgeTo() as $connectedVertex) {
                $this->findSolutionIfExists($connectedVertex, $path, $arrayCounter);
            }
        }
    }

    /**
     * A solution is guaranteed to be found if the path traversed is equal to the
     * number of characters in the solution and the vertex is the leaf node
     *
     * @param \Fhaculty\Graph\Vertex $vertex $vertex
     * @param $path
     * @return bool
     */
    private function hasSolution($vertex, $path)
    {
        return $this->isLeafNode($vertex) && count($path) === $this->wordLength;
    }

    /**
     * @param \Fhaculty\Graph\Vertex $vertex $vertex
     * @return bool
     */
    private function isLeafNode($vertex)
    {
        return count($vertex->getEdgesOut()) === 0;
    }
}