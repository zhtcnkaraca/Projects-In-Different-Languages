using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace final.Toblolarım
{
    class ogrenci
    {
        private int id;
        private string adi;
        private string soyadi;

        public ogrenci(string adi, string soyadi)
        {
            this.adi = adi;
            this.soyadi = soyadi;
        }

        public int Id { get => id; set => id = value; }
        public string Adi { get => adi; set => adi = value; }
        public string Soyadi { get => soyadi; set => soyadi = value; }

    }
}
