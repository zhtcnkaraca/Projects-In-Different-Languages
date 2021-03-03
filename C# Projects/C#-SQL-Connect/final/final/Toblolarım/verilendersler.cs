using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace final.Toblolarım
{
    class verilendersler
    {
        private int id;
        private int og_id;
        private int d_id;

        public verilendersler(int og_id, int d_id)
        {
            this.og_id = og_id;
            this.d_id = d_id;
        }

        public int Id { get => id; set => id = value; }
        public int Og_id { get => og_id; set => og_id = value; }
        public int D_id { get => d_id; set => d_id = value; }

    }
}
