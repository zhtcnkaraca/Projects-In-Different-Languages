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
    class AlinanderslerVeritabani : TemelVeritabani
    {
        public override void Ekle(object obj)
        {
            alinandersler alinan = (alinandersler)obj;
            Baglan();

            komut = new SqlCommand("alinanEkle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@O_id", alinan.O_id);
            komut.Parameters.AddWithValue("@D_id", alinan.D_id);
            komut.Parameters.AddWithValue("@Og_id", alinan.Og_id);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }

        public override void Guncelle(object obj)
        {
            alinandersler alinan = (alinandersler)obj;
            Baglan();

            komut = new SqlCommand("alinanGuncelle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@O_id", alinan.O_id);
            komut.Parameters.AddWithValue("@D_id", alinan.D_id);
            komut.Parameters.AddWithValue("@Og_id", alinan.Og_id);

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
            alinandersler alinan = (alinandersler)obj;
            Baglan();
            string sorgu = "select o.Adi,d.Adi,og.Adi from tbl_alinanDersler al,tbl_dersler d,tbl_ogrenci o,tbl_ogretmen og where al.D_id = d.id and al.O_id = o.id and al.Og_id = og.id and o.id = '" + alinan.O_id;
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
            alinandersler alinan = (alinandersler)obj;
            Baglan();

            komut = new SqlCommand("alinanSil", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@O_id", alinan.O_id);


            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }
    }
}
