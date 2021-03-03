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

      typedef adjacency_list<listS, vecS, directedS,
                               no_property, property<edge_weight_t, int> > Graph;
        typedef graph_traits<Graph>::vertex_descriptor Vertex;
        typedef std::pair<int,int> E;

        const int num_nodes = 5;
        E edges[] = { E(5,0), E(5,6), E(4,5), E(0,6), E(6,4), E(0,1),
                      E(3,4), E(1,7), E(7,3), E(1,2), E(2,7), E(2,3) };
        int weights[] = { 2,1,3,4,2,2,1,2,3,3,3,1};

        Graph G(edges, edges + sizeof(edges) / sizeof(E), weights, num_nodes);



        // vector for storing distance property
         std::vector<int> d(num_vertices(G));

         // get the first vertex
         Vertex s = *(vertices(G).first);
         // invoke variant 2 of Dijkstra's algorithm
         dijkstra_shortest_paths(G, s, distance_map(&d[0]));

         typename property_map<Graph, vertex_index_t>::type
                 index = get(vertex_index, G);

         std::cout << "distances from start vertex:" << std::endl;
         graph_traits<Graph>::vertex_iterator vi;
         for(vi = vertices(G).first; vi != vertices(G).second; ++vi)
           std::cout << "distance(" << index[*vi] << ") = "
                     << d[*vi] << std::endl;
         std::cout << std::endl;



         vector<Vertex> p(num_vertices(G), graph_traits<Graph>::null_vertex()); //the predecessor array
           dijkstra_shortest_paths(G, s, distance_map(&d[0]).
                                   visitor(m_make_predecessor_recorder(&p[0])));

           cout << "parents in the tree of shortest paths:" << endl;
           for(vi = vertices(G).first; vi != vertices(G).second; ++vi) {
             cout << "parent(" << *vi;
             if (p[*vi] == graph_traits<Graph>::null_vertex())
               cout << ") = no parent" << endl;
             else
               cout << ") = " << p[*vi] << endl;
           }



  }




