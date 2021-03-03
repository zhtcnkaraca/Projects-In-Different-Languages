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
    class NotVeritabani : TemelVeritabani
    {
        public override void Ekle(object obj)
        {
            not notu = (not)obj;
            Baglan();

            komut = new SqlCommand("notEkle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@D_id", notu.D_id);
            komut.Parameters.AddWithValue("@O_id", notu.O_id);
            komut.Parameters.AddWithValue("@not", notu.Notu);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }

        public override void Guncelle(object obj)
        {
            not notu = (not)obj;
            Baglan();

            komut = new SqlCommand("notGuncelle", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@D_id", notu.D_id);
            komut.Parameters.AddWithValue("@O_id", notu.O_id);
            komut.Parameters.AddWithValue("@Notu", notu.Notu);

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
            not notu = (not)obj;
            Baglan();
            string sorgu = "select o.Adi,d.Adi,n.notu from tbl_not n, tbl_dersler d, tbl_ogrenci o where n.D_id=d.id and n.o_id=o.id and o.id=" + notu.O_id;
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
            not notu = (not)obj;
            Baglan();

            komut = new SqlCommand("notSil", baglanti);
            komut.CommandType = CommandType.StoredProcedure;

            komut.Parameters.AddWithValue("@O_id", notu.O_id);

            komut.ExecuteNonQuery();
            baglanti.Close();
            baglanti.Dispose();
        }
    }
}
