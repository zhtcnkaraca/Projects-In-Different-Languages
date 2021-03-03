#include <iostream>                  // for std::cout
#include <utility>                   // for std::pair
#include <algorithm>                 // for std::for_each
#include <boost/graph/graph_traits.hpp>
#include <boost/graph/adjacency_list.hpp>
#include <boost/graph/dijkstra_shortest_paths.hpp>

using std::vector;
using std::cout;
using std::endl;
using namespace boost;

template <class PredecessorMap>
class m_record_predecessors : public dijkstra_visitor<>
{
public:
    m_record_predecessors(PredecessorMap p)
        : m_predecessor(p) { }

    template <class Edge, class Graph>
    void edge_relaxed(Edge e, Graph& g) {
        // set the parent of the target(e) to source(e)
        put(m_predecessor, target(e, g), source(e, g));
    }
protected:
    PredecessorMap m_predecessor;
};

template <class PredecessorMap>
m_record_predecessors<PredecessorMap>
m_make_predecessor_recorder(PredecessorMap p) {
    return m_record_predecessors<PredecessorMap>(p);
}

int main(int,char*[])
{
    //Tabloda kullandığım vertex ve kenarları listeleme
    /*
        typedef adjacency_list<vecS, vecS, bidirectionalS> Graph;

        enum { A, B, C, D, E, F, G , H, N };
        const int num_vertices = N;
        const char* name = "ABCDEFGH";

        typedef std::pair<int, int> Edge;
        Edge edge_array[] =
        { Edge(A,B), Edge(A,G), Edge(B,H), Edge(B,C), Edge(C,H), Edge(C,D),
          Edge(D,E), Edge(E,F), Edge(F,A), Edge(F,G), Edge(G,E), Edge(H,D) };
        const int num_edges = sizeof(edge_array)/sizeof(edge_array[0]);

        Graph g(edge_array, edge_array + sizeof(edge_array) / sizeof(Edge), num_vertices);

        typedef graph_traits<Graph>::vertex_descriptor Vertex;

        typedef property_map<Graph, vertex_index_t>::type IndexMap;
        IndexMap index = get(vertex_index, g);

        std::cout << "vertices(g) = ";
        typedef graph_traits<Graph>::vertex_iterator vertex_iter;
        std::pair<vertex_iter, vertex_iter> vp;
        for (vp = vertices(g); vp.first != vp.second; ++vp.first) {
            Vertex v = *vp.first;
            std::cout << name[index[v]] <<  " ";
        }
        std::cout << std::endl;

        std::cout << "edges(g) = ";
        graph_traits<Graph>::edge_iterator ei, ei_end;
        for (boost::tie(ei, ei_end) = edges(g); ei != ei_end; ++ei)
            std::cout << "(" << name[index[source(*ei, g)]]
                    << "," << name[index[target(*ei, g)]] << ") ";
        std::cout << std::endl;

        return 0;
*/


// Tablonun vertex' ler arasındaki uzaklıkları bulma ve hangi vertex' e hangi vertex' den gidildiği(parent)
    typedef adjacency_list<listS, vecS, directedS,
            no_property, property<edge_weight_t, int> > Graph;
    typedef graph_traits<Graph>::vertex_descriptor Vertex;
    const int num_nodes =5;
    typedef std::pair<int,int> Edge;
    enum { A, B, C, D, E, F, G , H, N };
    const char* name = "ABCDEFGH";
    Edge edge_array[] =
    { Edge(F,A), Edge(F,G), Edge(E,F), Edge(A,G), Edge(G,E), Edge(A,B),
      Edge(D,E), Edge(B,H), Edge(H,D), Edge(B,C), Edge(C,H), Edge(C,D) };
    int weights[] = { 2,1,3,4,2,2,1,2,3,3,3,1};

    Graph Gr(edge_array, edge_array + sizeof(edge_array) / sizeof(Edge), weights, num_nodes);

    // vector for storing distance property
    std::vector<int> d(num_vertices(Gr));

    // get the first vertex vkmbksafnbiasfnbadfobndafobndaf
    Vertex s = *(vertices(Gr).first);
    // invoke variant 2 of Dijkstra's algorithm
    dijkstra_shortest_paths(Gr, s, distance_map(&d[0]));

    typename property_map<Graph, vertex_index_t>::type
            index = get(vertex_index, Gr);

    std::cout << "distances from start vertex:" << std::endl;
    graph_traits<Graph>::vertex_iterator vi;
    for(vi = vertices(Gr).first; vi != vertices(Gr).second; ++vi)
        std::cout << "distance(" << name[index[*vi]] << ") = "
                                                     << d[*vi] << std::endl;
    std::cout << std::endl;

    vector<Vertex> p(num_vertices(Gr), graph_traits<Graph>::null_vertex()); //the predecessor array
    dijkstra_shortest_paths(Gr, s, distance_map(&d[0]).
            visitor(m_make_predecessor_recorder(&p[0])));

    cout << "parents in the tree of shortest paths:" << endl;
    for(vi = vertices(Gr).first; vi != vertices(Gr).second; ++vi) {
        cout << "parent(" << name[*vi];
        if (p[*vi] == graph_traits<Graph>::null_vertex())
            cout << ") = no parent" << endl;
        else
            cout << ") = " << name[p[*vi]] << endl;
    }

}




