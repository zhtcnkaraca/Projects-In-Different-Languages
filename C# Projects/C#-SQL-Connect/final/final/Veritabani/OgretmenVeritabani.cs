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
    class OgretmenVeritabani : TemelVeritabani
    {
        public override void Ekle(object obj)
        {
            ogretmen og = (ogretmen)obj;
            Baglan();

            komut = new SqlCommand("ogretmenEkle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Adi", og.Adi);
            komut.Parameters.AddWithValue("@Soyadi", og.Soyadi);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }

        public override void Guncelle(object obj)
        {
            throw new NotImplementedException();
        }

        public override DataTable Listele()
        {
            Baglan();
            string sorgu = "select Adi from tbl_ogretmen";
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

        public override DataTable Listele(object obj)
        {
            throw new NotImplementedException();
        }

        public override void Sil(object obj)
        {
            ogretmen og = (ogretmen)obj;
            Baglan();

            komut = new SqlCommand("ogretmenSil", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Adi", og.Adi);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }
    }
}
