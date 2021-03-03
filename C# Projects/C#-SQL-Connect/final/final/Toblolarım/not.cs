using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace final.Toblolarım
{
    class not
    {
        private int id;
        private int d_id;
        private int o_id;
        private int notu;

        public not(int d_id, int o_id, int notu)
        {
            this.d_id = d_id;
            this.o_id = o_id;
            this.notu = notu;

        }

        public int Id { get => id; set => id = value; }
        public int D_id { get => d_id; set => d_id = value; }
        public int O_id { get => o_id; set => o_id = value; }
        public int Notu { get => notu; set => notu = value; }

    }
}
