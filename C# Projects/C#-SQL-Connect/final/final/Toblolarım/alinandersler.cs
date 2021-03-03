using final.Veritabani;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace final.Toblolarım
{
    class alinandersler
    {
        private int id;
        private int o_id;
        private int d_id;
        private int og_id;

        public alinandersler(int o_id, int d_id, int og_id)
        {
            this.o_id = o_id;
            this.d_id = d_id;
            this.og_id = og_id;
        }

        public int Id { get => id; set => id = value; }
        public int O_id { get => o_id; set => o_id = value; }
        public int D_id { get => d_id; set => d_id = value; }
        public int Og_id { get => og_id; set => og_id = value; }
    }
}
