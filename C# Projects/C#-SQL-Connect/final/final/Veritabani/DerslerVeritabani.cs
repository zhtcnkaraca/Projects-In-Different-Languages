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
    class DerslerVeritabani : TemelVeritabani
    {
        public override void Ekle(object obj)
        {
            dersler ders = (dersler)obj;
            Baglan();

            komut = new SqlCommand("dersEkle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Adi", ders.Adi);

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
            string sorgu = "select Adi from tbl_dersler";
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
            dersler ders = (dersler)obj;
            Baglan();

            komut = new SqlCommand("dersSil", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@Adi", ders.Adi);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }
    }
}
