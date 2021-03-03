#ifndef NODE_H
#define NODE_H
#include <iostream>
using namespace std;
#include <string>

class Node{
private:
    int ogrenci_no;
    int ogrenci_notu;
    string ogrenci_adi;
    string ogrenci_soyadi;
    Node *left;
    Node *right;

public:
    Node(void);
    Node(int ogr_no, int ogr_notu, string ad, string soyad);
    void setOgrenciNo( int ogr_no );
    int getOgrenciNo( void );
    void setOgrenciNotu( int ogr_notu );
    int getOgrenciNotu( void );
    void setLeftPointer( Node *next_left );
    Node *getLeftPointer( void );
    void setRightPointer( Node *next_right );
    Node *getRightPointer( void );


    void setOgrenciAdi( string str);
    string getOgrenciAdi( void );
    void setOgrenciSoyadi( string str );
    string getOgrenciSoyadi(void);

};


Node::Node(void){
    ogrenci_no = -1;
    ogrenci_notu = 0;
    ogrenci_adi = "Belirsiz";
    ogrenci_soyadi = "Belirsiz";
    left=0;
    right=0;
}
Node::Node(int ogr_no, int ogr_notu, string ad, string soyad){
    ogrenci_no=ogr_no;
    ogrenci_notu = ogr_notu;
    ogrenci_adi = ad;
    ogrenci_soyadi=soyad;
    left=0;
    right=0;
}
void Node::setOgrenciAdi( string str){
    ogrenci_adi = str;
}
string Node::getOgrenciAdi( void ){
    return ogrenci_adi;
}
void Node::setOgrenciSoyadi( string str ){
    ogrenci_soyadi = str;
}
string Node::getOgrenciSoyadi(void){
    return ogrenci_soyadi;
}

void Node::setOgrenciNo(int ogr_no){
    ogrenci_no = ogr_no;
}
int Node::getOgrenciNo(void){
    return ogrenci_no;
}
void Node::setOgrenciNotu(int ogr_notu){
    ogrenci_notu = ogr_notu;
}
int Node::getOgrenciNotu(void){
    return ogrenci_notu;
}
void Node::setLeftPointer(Node *next_left){
    left = next_left;
}
Node *Node::getLeftPointer(void){
    return left;
}
void Node::setRightPointer(Node *next_right){
    right = next_right;
}
Node *Node::getRightPointer(void){
    return right;
}








#endif // NODE_H
