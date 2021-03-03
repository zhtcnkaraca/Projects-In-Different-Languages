using final.Toblolarım;
using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace final.Veritabani
{
    class VerilenderslerVeritabani : TemelVeritabani
    {
        public override void Ekle(object obj)
        {
            verilendersler verilen = (verilendersler)obj;
            Baglan();

            komut = new SqlCommand("verilenEkle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Og_id", verilen.Og_id);
            komut.Parameters.AddWithValue("@D_id", verilen.D_id);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }

        public override void Guncelle(object obj)
        {
            verilendersler verilen = (verilendersler)obj;
            Baglan();

            komut = new SqlCommand("verilenGuncelle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Og_id", verilen.Og_id);
            komut.Parameters.AddWithValue("@D_id", verilen.D_id);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }

        public override DataTable Listele()
        {
            throw new NotImplementedException();
        }

        public override DataTable Listele(object obj)
        {
            verilendersler verilen = (verilendersler)obj;
            Baglan();
            string sorgu = "select d.Adi,og.Adi from tbl_alinanDersler al,tbl_dersler d,tbl_ogretmen og where al.D_id = d.id  and al.Og_id = og.id and d.id = " + verilen.D_id;
            komut = new SqlCommand(sorgu, baglanti);
            komut.CommandType = CommandType.Text;

            komut.ExecuteNonQuery();
            adaptor = new SqlDataAdapter(komut);
            tablo = new DataTable();
            adaptor.Fill(tablo);
            baglanti.Close();
            baglanti.Dispose();
            return tablo;
        }

        public override void Sil(object obj)
        {
            verilendersler verilen = (verilendersler)obj;
            Baglan();

            komut = new SqlCommand("verilenSil", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Og_id", verilen.Og_id);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }
    }
}
