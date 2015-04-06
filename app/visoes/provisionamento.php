<?php

echo '<<GEPON ONU CONFIG FILE>>Digests:'.$dados[0]["versaoConfigONU"].'.101
<?xml version="1.0"?>
<DslCpeConfig version="3.0">
  <InternetGatewayDevice>
    <LANDeviceNumberOfEntries>1</LANDeviceNumberOfEntries>
    <WANDeviceNumberOfEntries>1</WANDeviceNumberOfEntries>    
    <DeviceInfo>
      <ProductClass>96828HGW</ProductClass>
      <FirstUseDate>0001-01-01T00:00:00Z</FirstUseDate>
      <VendorConfigFileNumberOfEntries>0</VendorConfigFileNumberOfEntries>
      <X_CT-COM_Ping>
        <PingConfig instance="1">
          <FinishRepetitions>0</FinishRepetitions>
        </PingConfig>
        <PingConfig instance="2">
          <FinishRepetitions>0</FinishRepetitions>
        </PingConfig>
        <PingConfig instance="3">
          <FinishRepetitions>0</FinishRepetitions>
        </PingConfig>
        <PingConfig nextInstance="4" ></PingConfig>
      </X_CT-COM_Ping>
      <X_CT-COM_ServiceManage>
        <FtpEnable>TRUE</FtpEnable>
        <TelnetEnable>TRUE</TelnetEnable>
        <TelnetPassword>' . $dados[0]["TelnetPassword"] . '</TelnetPassword>
      </X_CT-COM_ServiceManage>
      <X_CT-COM_ALGAbility>
        <FTPEnable>TRUE</FTPEnable>
      </X_CT-COM_ALGAbility>
      <X_CT-COM_TeleComAccount>
        <Password>Pw@'.preg_replace('(\:)', '', $dados[0]["macONU"]).'</Password>
      </X_CT-COM_TeleComAccount>
      <X_CT_COM_RemoteStatus>
        <StatusMessage>2</StatusMessage>
      </X_CT_COM_RemoteStatus>
      <X_CT-COM_Syslog>
        <Enable>TRUE</Enable>
      </X_CT-COM_Syslog>
    </DeviceInfo>
    <X_BROADCOM_COM_SyslogCfg>
      <Status>Enabled</Status>
      <LocalLogLevel>Error</LocalLogLevel>
      <RemoteLogLevel>Error</RemoteLogLevel>
    </X_BROADCOM_COM_SyslogCfg>
    <X_BROADCOM_COM_LoginCfg>
      <UserPassword>Pw@'.preg_replace("(\:)", "", $dados[0]["macONU"]).'</UserPassword>
    </X_BROADCOM_COM_LoginCfg>
    <X_BROADCOM_COM_AppCfg>
      <Tr69cCfg>
        <ConnectionRequestAuthentication>FALSE</ConnectionRequestAuthentication>
      </Tr69cCfg>
    </X_BROADCOM_COM_AppCfg>
    <X_BROADCOM_COM_EthernetSwitch>
      <NumberOfVirtualPorts>4</NumberOfVirtualPorts>
      <EnableVirtualPorts>TRUE</EnableVirtualPorts>
      <IfName>(null)</IfName>
    </X_BROADCOM_COM_EthernetSwitch>
    <ManagementServer>
      <URL>http://devacs.edatahome.com:9090/ACS-server/ACS</URL>
      <Username>hgw</Username>
      <Password>hgw</Password>
      <PeriodicInformInterval>43200</PeriodicInformInterval>
      <PeriodicInformTime>2014-07-24T12:00:08+00:00</PeriodicInformTime>
      <X_BROADCOM_COM_BoundIfName>ppp0.1</X_BROADCOM_COM_BoundIfName>
      <ConnectionRequestURL notification="2">(null)</ConnectionRequestURL>
      <ConnectionRequestUsername>itms</ConnectionRequestUsername>
      <ConnectionRequestPassword>itms</ConnectionRequestPassword>
    </ManagementServer>
    <Time>
      <DaylightSavingsStart>2014-07-24T12:00:13+00:00</DaylightSavingsStart>
      <DaylightSavingsEnd>2014-07-24T12:00:13+00:00</DaylightSavingsEnd>
    </Time>
    <Layer2Bridging>
      <BridgeNumberOfEntries>1</BridgeNumberOfEntries>
      <FilterNumberOfEntries>8</FilterNumberOfEntries>
      <MarkingNumberOfEntries>0</MarkingNumberOfEntries>
      <AvailableInterfaceNumberOfEntries>8</AvailableInterfaceNumberOfEntries>
      <Bridge instance="1">
        <BridgeKey>0</BridgeKey>
        <BridgeEnable>TRUE</BridgeEnable>
        <BridgeName>Default</BridgeName>
      </Bridge>
      <Bridge nextInstance="2" ></Bridge>
      <Filter instance="1">
        <FilterKey>1</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>1</FilterInterface>
      </Filter>
      <Filter instance="2">
        <FilterKey>2</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>2</FilterInterface>
      </Filter>
      <Filter instance="3">
        <FilterKey>3</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>3</FilterInterface>
      </Filter>
      <Filter instance="4">
        <FilterKey>4</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>4</FilterInterface>
      </Filter>
      <Filter instance="5">
        <FilterKey>5</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>5</FilterInterface>
      </Filter>
      <Filter instance="6">
        <FilterKey>6</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>6</FilterInterface>
      </Filter>
      <Filter instance="7">
        <FilterKey>7</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>7</FilterInterface>
      </Filter>
      <Filter instance="8">
        <FilterKey>8</FilterKey>
        <FilterEnable>TRUE</FilterEnable>
        <FilterBridgeReference>0</FilterBridgeReference>
        <FilterInterface>8</FilterInterface>
      </Filter>
      <Filter nextInstance="9" ></Filter>
      <AvailableInterface instance="1">
        <AvailableInterfaceKey>1</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.1</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="2">
        <AvailableInterfaceKey>2</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.2</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="3">
        <AvailableInterfaceKey>3</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.3</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="4">
        <AvailableInterfaceKey>4</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.4</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="5">
        <AvailableInterfaceKey>5</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="6">
        <AvailableInterfaceKey>6</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="7">
        <AvailableInterfaceKey>7</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface instance="8">
        <AvailableInterfaceKey>8</AvailableInterfaceKey>
        <InterfaceType>LANInterface</InterfaceType>
        <InterfaceReference>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</InterfaceReference>
      </AvailableInterface>
      <AvailableInterface nextInstance="9" ></AvailableInterface>
    </Layer2Bridging>
    <QueueManagement>
      <ClassificationNumberOfEntries>0</ClassificationNumberOfEntries>
      <AppNumberOfEntries>0</AppNumberOfEntries>
      <FlowNumberOfEntries>0</FlowNumberOfEntries>
      <PolicerNumberOfEntries>0</PolicerNumberOfEntries>
      <QueueNumberOfEntries>32</QueueNumberOfEntries>
      <Queue instance="1">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="2">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="3">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="4">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="5">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="6">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="7">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="8">
        <QueueEnable>TRUE</QueueEnable>
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="9">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="10">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="11">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="12">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="13">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="14">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="15">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="16">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.2</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="17">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="18">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="19">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="20">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="21">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="22">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="23">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="24">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.3</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="25">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="26">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>2</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Voice Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="27">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>3</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="28">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>4</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Video Priority</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="29">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>5</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="30">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>6</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="31">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>7</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Background</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue instance="32">
        <QueueInterface>InternetGatewayDevice.LANDevice.1.WLANConfiguration.4</QueueInterface>
        <QueuePrecedence>8</QueuePrecedence>
        <X_BROADCOM_COM_QueueName>WMM Best Effort</X_BROADCOM_COM_QueueName>
      </Queue>
      <Queue nextInstance="33" ></Queue>
    </QueueManagement>
    <EponSoftwareImage instance="1">
      <Version>534F465457415245494D41474530</Version>
      <IsCommitted>FALSE</IsCommitted>
    </EponSoftwareImage>
    <EponSoftwareImage instance="2">
      <ManagedEntityId>1</ManagedEntityId>
      <Version>534F465457415245494D41474531</Version>
      <IsActive>FALSE</IsActive>
    </EponSoftwareImage>
    <LANDevice instance="1">
      <LANEthernetInterfaceNumberOfEntries>4</LANEthernetInterfaceNumberOfEntries>
      <LANUSBInterfaceNumberOfEntries>0</LANUSBInterfaceNumberOfEntries>
      <LANWLANConfigurationNumberOfEntries>4</LANWLANConfigurationNumberOfEntries>
      <X_BROADCOM_COM_LANMocaInterfaceNumberOfEntries>0</X_BROADCOM_COM_LANMocaInterfaceNumberOfEntries>
      <X_BROADCOM_COM_LANEponInterfaceNumberOfEntries>0</X_BROADCOM_COM_LANEponInterfaceNumberOfEntries>
      <LANHostConfigManagement>
        <DHCPServerEnable>TRUE</DHCPServerEnable>
        <IPInterfaceNumberOfEntries>1</IPInterfaceNumberOfEntries>
        <X_CT-COM_STB-MinAddress>192.168.86.130</X_CT-COM_STB-MinAddress>
        <X_CT-COM_STB-MaxAddress>192.168.86.150</X_CT-COM_STB-MaxAddress>
        <X_CT-COM_Phone-MinAddress>192.168.86.170</X_CT-COM_Phone-MinAddress>
        <X_CT-COM_Phone-MaxAddress>192.168.86.180</X_CT-COM_Phone-MaxAddress>
        <X_CT-COM_Camera-MinAddress>192.168.86.110</X_CT-COM_Camera-MinAddress>
        <X_CT-COM_Camera-MaxAddress>192.168.86.120</X_CT-COM_Camera-MaxAddress>
        <X_CT-COM_Computer-MinAddress>192.168.86.2</X_CT-COM_Computer-MinAddress>
        <X_CT-COM_Computer-MaxAddress>192.168.86.100</X_CT-COM_Computer-MaxAddress>
        <IPInterface instance="1">
          <Enable>TRUE</Enable>
          <X_BROADCOM_COM_IfName>br0</X_BROADCOM_COM_IfName>
        </IPInterface>
        <IPInterface nextInstance="2" ></IPInterface>
      </LANHostConfigManagement>
      <X_BROADCOM_COM_IPv6LANHostConfigManagement>
        <IPv6InterfaceNumberOfEntries>0</IPv6InterfaceNumberOfEntries>
        <X_BROADCOM_COM_MldSnoopingConfig>
          <Enable>TRUE</Enable>
        </X_BROADCOM_COM_MldSnoopingConfig>
      </X_BROADCOM_COM_IPv6LANHostConfigManagement>
      <LANEthernetInterfaceConfig instance="1">
        <Enable>TRUE</Enable>
        <X_BROADCOM_COM_IfName>eth0</X_BROADCOM_COM_IfName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig instance="2">
        <Enable>TRUE</Enable>
        <X_BROADCOM_COM_IfName>eth1</X_BROADCOM_COM_IfName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig instance="3">
        <Enable>TRUE</Enable>
        <X_BROADCOM_COM_IfName>eth2</X_BROADCOM_COM_IfName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig instance="4">
        <Enable>TRUE</Enable>
        <X_BROADCOM_COM_IfName>eth3</X_BROADCOM_COM_IfName>
      </LANEthernetInterfaceConfig>
      <LANEthernetInterfaceConfig nextInstance="5" ></LANEthernetInterfaceConfig>
      <WLANConfiguration instance="1">
        <Name>wl0</Name>
        <MaxBitRate>54</MaxBitRate>
        <Channel>1</Channel>
        <SSID>'. $dados[0]["SSID"] . substr($dados[0]["macONU"],12,2).substr($dados[0]["macONU"],15,2).'</SSID>
        <BeaconType>11i</BeaconType>
        <Standard>n</Standard>
        <BasicEncryptionModes>None</BasicEncryptionModes>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <IEEE11iEncryptionModes>TKIPandAESEncryption</IEEE11iEncryptionModes>
        <RadioEnabled>TRUE</RadioEnabled>
        <WMMSupported>TRUE</WMMSupported>
        <UAPSDSupported>TRUE</UAPSDSupported>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>4</X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>
        <X_BROADCOM_COM_BaseCfg_Info>ap led wme 802.11d 802.11h mbss16 afterburner ampdu amsdurx amsdutx wmf rxchain_pwrsave radio_pwrsave bcm_dcs </X_BROADCOM_COM_BaseCfg_Info>
        <X_BROADCOM_COM_BaseCfg_CoreRev>30</X_BROADCOM_COM_BaseCfg_CoreRev>
        <X_BROADCOM_COM_BaseCfg_Ver>5.100.138.20.cpe4.12</X_BROADCOM_COM_BaseCfg_Ver>
        <X_BROADCOM_COM_BaseCfg_MBSSIDSupported>1</X_BROADCOM_COM_BaseCfg_MBSSIDSupported>
        <X_BROADCOM_COM_BaseCfg_AburnSupported>1</X_BROADCOM_COM_BaseCfg_AburnSupported>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <X_BROADCOM_COM_BaseCfg_WmfSupported>1</X_BROADCOM_COM_BaseCfg_WmfSupported>
        <WEPKey instance="1">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="2">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="3">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="4">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
          <PreSharedKey>'.preg_replace('(\:)', '', $dados[0]["macONU"]).'</PreSharedKey>
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <WPS>
          <Enable>TRUE</Enable>
        </WPS>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
        <X_BROADCOM_COM_MimoCfg>
          <X_BROADCOM_COM_NBw>20</X_BROADCOM_COM_NBw>
        </X_BROADCOM_COM_MimoCfg>
      </WLANConfiguration>
      <WLANConfiguration instance="2">
        <Enable>FALSE</Enable>
        <X_BROADCOM_COM_ShowToACS_CT>FALSE</X_BROADCOM_COM_ShowToACS_CT>
        <Name>wl0.1</Name>
        <MaxBitRate>54</MaxBitRate>
        <Channel>1</Channel>
        <SSID>WirelessAP2</SSID>
        <BeaconType>11i</BeaconType>
        <Standard>n</Standard>
        <BasicEncryptionModes>None</BasicEncryptionModes>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <IEEE11iEncryptionModes>TKIPandAESEncryption</IEEE11iEncryptionModes>
        <RadioEnabled>TRUE</RadioEnabled>
        <WMMSupported>TRUE</WMMSupported>
        <UAPSDSupported>TRUE</UAPSDSupported>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>4</X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>
        <X_BROADCOM_COM_BaseCfg_Info>ap led wme 802.11d 802.11h mbss16 afterburner ampdu amsdurx amsdutx wmf rxchain_pwrsave radio_pwrsave bcm_dcs </X_BROADCOM_COM_BaseCfg_Info>
        <X_BROADCOM_COM_BaseCfg_CoreRev>30</X_BROADCOM_COM_BaseCfg_CoreRev>
        <X_BROADCOM_COM_BaseCfg_Ver>5.100.138.20.cpe4.12</X_BROADCOM_COM_BaseCfg_Ver>
        <X_BROADCOM_COM_BaseCfg_MBSSIDSupported>1</X_BROADCOM_COM_BaseCfg_MBSSIDSupported>
        <X_BROADCOM_COM_BaseCfg_AburnSupported>1</X_BROADCOM_COM_BaseCfg_AburnSupported>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <X_BROADCOM_COM_BaseCfg_WmfSupported>1</X_BROADCOM_COM_BaseCfg_WmfSupported>
        <X_CT-COM_APModuleEnable>FALSE</X_CT-COM_APModuleEnable>
        <WEPKey instance="1">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="2">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="3">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="4">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
      </WLANConfiguration>
      <WLANConfiguration instance="3">
        <Enable>FALSE</Enable>
        <X_BROADCOM_COM_ShowToACS_CT>FALSE</X_BROADCOM_COM_ShowToACS_CT>
        <Name>wl0.2</Name>
        <MaxBitRate>54</MaxBitRate>
        <Channel>1</Channel>
        <SSID>WirelessAP3</SSID>
        <BeaconType>11i</BeaconType>
        <Standard>n</Standard>
        <BasicEncryptionModes>None</BasicEncryptionModes>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <IEEE11iEncryptionModes>TKIPandAESEncryption</IEEE11iEncryptionModes>
        <RadioEnabled>TRUE</RadioEnabled>
        <WMMSupported>TRUE</WMMSupported>
        <UAPSDSupported>TRUE</UAPSDSupported>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>4</X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>
        <X_BROADCOM_COM_BaseCfg_Info>ap led wme 802.11d 802.11h mbss16 afterburner ampdu amsdurx amsdutx wmf rxchain_pwrsave radio_pwrsave bcm_dcs </X_BROADCOM_COM_BaseCfg_Info>
        <X_BROADCOM_COM_BaseCfg_CoreRev>30</X_BROADCOM_COM_BaseCfg_CoreRev>
        <X_BROADCOM_COM_BaseCfg_Ver>5.100.138.20.cpe4.12</X_BROADCOM_COM_BaseCfg_Ver>
        <X_BROADCOM_COM_BaseCfg_MBSSIDSupported>1</X_BROADCOM_COM_BaseCfg_MBSSIDSupported>
        <X_BROADCOM_COM_BaseCfg_AburnSupported>1</X_BROADCOM_COM_BaseCfg_AburnSupported>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <X_BROADCOM_COM_BaseCfg_WmfSupported>1</X_BROADCOM_COM_BaseCfg_WmfSupported>
        <X_CT-COM_APModuleEnable>FALSE</X_CT-COM_APModuleEnable>
        <WEPKey instance="1">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="2">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="3">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="4">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
      </WLANConfiguration>
      <WLANConfiguration instance="4">
        <Enable>FALSE</Enable>
        <X_BROADCOM_COM_ShowToACS_CT>FALSE</X_BROADCOM_COM_ShowToACS_CT>
        <Name>wl0.3</Name>
        <MaxBitRate>54</MaxBitRate>
        <Channel>1</Channel>
        <SSID>WirelessAP4</SSID>
        <BeaconType>11i</BeaconType>
        <Standard>n</Standard>
        <BasicEncryptionModes>None</BasicEncryptionModes>
        <WPAEncryptionModes>TKIPandAESEncryption</WPAEncryptionModes>
        <IEEE11iEncryptionModes>TKIPandAESEncryption</IEEE11iEncryptionModes>
        <RadioEnabled>TRUE</RadioEnabled>
        <WMMSupported>TRUE</WMMSupported>
        <UAPSDSupported>TRUE</UAPSDSupported>
        <WMMEnable>TRUE</WMMEnable>
        <UAPSDEnable>TRUE</UAPSDEnable>
        <X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>4</X_BROADCOM_COM_BaseCfg_MBSSNumOfAdapter>
        <X_BROADCOM_COM_BaseCfg_Info>ap led wme 802.11d 802.11h mbss16 afterburner ampdu amsdurx amsdutx wmf rxchain_pwrsave radio_pwrsave bcm_dcs </X_BROADCOM_COM_BaseCfg_Info>
        <X_BROADCOM_COM_BaseCfg_CoreRev>30</X_BROADCOM_COM_BaseCfg_CoreRev>
        <X_BROADCOM_COM_BaseCfg_Ver>5.100.138.20.cpe4.12</X_BROADCOM_COM_BaseCfg_Ver>
        <X_BROADCOM_COM_BaseCfg_MBSSIDSupported>1</X_BROADCOM_COM_BaseCfg_MBSSIDSupported>
        <X_BROADCOM_COM_BaseCfg_AburnSupported>1</X_BROADCOM_COM_BaseCfg_AburnSupported>
        <X_BROADCOM_COM_BaseCfg_AmpduSupported>1</X_BROADCOM_COM_BaseCfg_AmpduSupported>
        <X_BROADCOM_COM_BaseCfg_AmsduSupported>1</X_BROADCOM_COM_BaseCfg_AmsduSupported>
        <X_BROADCOM_COM_BaseCfg_WmfSupported>1</X_BROADCOM_COM_BaseCfg_WmfSupported>
        <X_CT-COM_APModuleEnable>FALSE</X_CT-COM_APModuleEnable>
        <WEPKey instance="1">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="2">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="3">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey instance="4">
          <WEPKey>1234567890123</WEPKey>
        </WEPKey>
        <WEPKey nextInstance="5" ></WEPKey>
        <PreSharedKey instance="1">
        </PreSharedKey>
        <PreSharedKey nextInstance="2" ></PreSharedKey>
        <X_BROADCOM_COM_Wds>
          <Static instance="1">
          </Static>
          <Static instance="2">
          </Static>
          <Static instance="3">
          </Static>
          <Static instance="4">
          </Static>
          <Static nextInstance="5" ></Static>
        </X_BROADCOM_COM_Wds>
      </WLANConfiguration>
      <WLANConfiguration nextInstance="5" ></WLANConfiguration>
    </LANDevice>
    <LANDevice nextInstance="2" ></LANDevice>
    <WANDevice instance="1">
      <WANConnectionNumberOfEntries>1</WANConnectionNumberOfEntries>
      <WANCommonInterfaceConfig>
        <WANAccessType>X_BROADCOM_COM_PON</WANAccessType>
      </WANCommonInterfaceConfig>
      <X_BROADCOM_COM_EponInterfaceConfig>
        <Enable>TRUE</Enable>
        <IfName>epon0</IfName>
        <PersistentDevice>TRUE</PersistentDevice>
      </X_BROADCOM_COM_EponInterfaceConfig>
      <X_BROADCOM_COM_WANPonInterfaceConfig>
        <Enable>TRUE</Enable>
        <PonType>EPON</PonType>
      </X_BROADCOM_COM_WANPonInterfaceConfig>
      <WANConnectionDevice instance="3">
        <WANIPConnectionNumberOfEntries>0</WANIPConnectionNumberOfEntries>
        <WANPPPConnectionNumberOfEntries>1</WANPPPConnectionNumberOfEntries>
        <X_CT-COM_WANEponLinkConfig>
          <Enable>TRUE</Enable>
          <Mode>0</Mode>
        </X_CT-COM_WANEponLinkConfig>
        <WANPPPConnection instance="1">
          <Enable>TRUE</Enable>
          <ConnectionType>IP_Routed</ConnectionType>
          <Name>1_TR069_VOIP_INTERNET_R_VID_</Name>
          <NATEnabled>TRUE</NATEnabled>
          <X_BROADCOM_COM_FirewallEnabled>TRUE</X_BROADCOM_COM_FirewallEnabled>
          <X_BROADCOM_COM_IGMPEnabled>TRUE</X_BROADCOM_COM_IGMPEnabled>
          <Username>'.$dados[0]["loginPPPoEONU"].'</Username>
          <Password>'.base64_encode($dados[0]["senhaPPPoEONU"]."\0").'</Password>
          <X_BROADCOM_COM_ConnectionId>1</X_BROADCOM_COM_ConnectionId>
          <X_BROADCOM_COM_IfName>ppp0.1</X_BROADCOM_COM_IfName>
          <DNSEnabled>TRUE</DNSEnabled>
          <PPPoEServiceName></PPPoEServiceName>
          <ConnectionTrigger>AlwaysOn</ConnectionTrigger>
          <PortMappingNumberOfEntries>0</PortMappingNumberOfEntries>
          <X_CT_COM_IPV4Enable>TRUE</X_CT_COM_IPV4Enable>
          <X_CT-COM_LanInterface>InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.1,InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.2,InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.3,InternetGatewayDevice.LANDevice.1.LANEthernetInterfaceConfig.4,InternetGatewayDevice.LANDevice.1.WLANConfiguration.1</X_CT-COM_LanInterface>
          <X_CT-COM_ServiceList>TR069,VOIP,INTERNET</X_CT-COM_ServiceList>
          <X_CT-COM_IPv6>
            <IPv6Address>
              <Origin>NONE</Origin>
            </IPv6Address>
            <IPv6Prefix>
              <Origin>NONE</Origin>
            </IPv6Prefix>
          </X_CT-COM_IPv6>
        </WANPPPConnection>
        <WANPPPConnection nextInstance="2" ></WANPPPConnection>
      </WANConnectionDevice>
      <WANConnectionDevice nextInstance="4" ></WANConnectionDevice>
    </WANDevice>
    <Layer3Forwarding>
      <ForwardNumberOfEntries>0</ForwardNumberOfEntries>
    </Layer3Forwarding>
    <X_BROADCOM_COM_IPv6Layer3Forwarding>
      <ForwardNumberOfEntries>0</ForwardNumberOfEntries>
    </X_BROADCOM_COM_IPv6Layer3Forwarding>
    <Services>
      <StorageService instance="1">
      </StorageService>
      <StorageService nextInstance="2" ></StorageService>
      <VoiceService instance="1">
        <VoiceProfileNumberOfEntries>0</VoiceProfileNumberOfEntries>
        <X_BROADCOM_COM_BoundIfName>ppp0.1</X_BROADCOM_COM_BoundIfName>
        <Capabilities>
          <Codecs instance="1">
          </Codecs>
          <Codecs instance="2">
          </Codecs>
          <Codecs instance="3">
          </Codecs>
          <Codecs instance="4">
          </Codecs>
          <Codecs nextInstance="5" ></Codecs>
        </Capabilities>
        <VoiceProfile instance="1">
          <DTMFMethod>RFC2833</DTMFMethod>
          <Region>BR</Region>
          <PbxInsideDigitmap>[0-8]xxx</PbxInsideDigitmap>
          <DigitMap>[0-9].S|x.#</DigitMap>
          <X_CT-COM_InterDigitTimerShort>2</X_CT-COM_InterDigitTimerShort>
          <CallIdMsgType>DTMF</CallIdMsgType>
          <CallIdFskAppendChar>$</CallIdFskAppendChar>
          <VersionTime>20140724180153</VersionTime>
          <SIP>
            <ProxyServer>' . $dados[0]["ProxyServer"] . '</ProxyServer>
            <RegistrarServer>' . $dados[0]["RegistrarServer"] . '</RegistrarServer>
            <UserAgentPort>' . $dados[0]["UserAgentPort"] . '</UserAgentPort>
            <RegisterExpires>1800</RegisterExpires>
          </SIP>
          <Line instance="1">';
          
        if($dados[0]["numero1ONU"]){
            echo '          <Enable>Enabled</Enable>
            <DirectoryNumber>55'.preg_replace('(\-)', '', $dados[0]["numero1ONU"]).'</DirectoryNumber>
            <SIP>
              <AuthUserName>55'.preg_replace('(\-)', '', $dados[0]["numero1ONU"]).'</AuthUserName>
              <AuthPassword>'.$dados[0]["controle1ONU"].'</AuthPassword>
              <URI>55'.preg_replace('(\-)', '', $dados[0]["numero1ONU"]).'</URI>
            </SIP>';
        }
            
        echo '    <VoiceProcessing>
              <TransmitGain>6</TransmitGain>
              <ReceiveGain>6</ReceiveGain>
            </VoiceProcessing>
            <Codec>
              <List instance="1">
                <PacketizationPeriod>20</PacketizationPeriod>
              </List>
              <List instance="2">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>2</Priority>
              </List>
              <List instance="3">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>3</Priority>
              </List>
              <List instance="4">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>4</Priority>
              </List>
              <List nextInstance="5" ></List>
            </Codec>
          </Line>
          <Line instance="2">';
        
        if($dados[0]["numero2ONU"]){            
            echo '      <Enable>Enabled</Enable>
            <DirectoryNumber>55'.preg_replace('(\-)', '', $dados[0]["numero2ONU"]).'</DirectoryNumber>
            <SIP>
              <AuthUserName>55'.preg_replace('(\-)', '', $dados[0]["numero2ONU"]).'</AuthUserName>
              <AuthPassword>'.$dados[0]["controle2ONU"].'</AuthPassword>
              <URI>55'.preg_replace('(\-)', '', $dados[0]["numero2ONU"]).'</URI>
            </SIP>';
        }
        
        echo '      <VoiceProcessing>
              <TransmitGain>6</TransmitGain>
              <ReceiveGain>6</ReceiveGain>
            </VoiceProcessing>
            <Codec>
              <List instance="1">
                <PacketizationPeriod>20</PacketizationPeriod>
              </List>
              <List instance="2">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>2</Priority>
              </List>
              <List instance="3">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>3</Priority>
              </List>
              <List instance="4">
                <PacketizationPeriod>20</PacketizationPeriod>
                <Priority>4</Priority>
              </List>
              <List nextInstance="5" ></List>
            </Codec>
          </Line>
          <Line nextInstance="3" ></Line>
        </VoiceProfile>
        <VoiceProfile nextInstance="2" ></VoiceProfile>
        <PhyInterface instance="1">
          <X_CT-COM_Stats>
            <PoorQualityList instance="1">
            </PoorQualityList>
            <PoorQualityList instance="2">
            </PoorQualityList>
            <PoorQualityList instance="3">
            </PoorQualityList>
            <PoorQualityList instance="4">
            </PoorQualityList>
            <PoorQualityList instance="5">
            </PoorQualityList>
            <PoorQualityList instance="6">
            </PoorQualityList>
            <PoorQualityList instance="7">
            </PoorQualityList>
            <PoorQualityList instance="8">
            </PoorQualityList>
            <PoorQualityList instance="9">
            </PoorQualityList>
            <PoorQualityList instance="10">
            </PoorQualityList>
            <PoorQualityList nextInstance="11" ></PoorQualityList>
          </X_CT-COM_Stats>
          <Tests>
            <TestState>None</TestState>
            <TestSelector>None</TestSelector>
            <X_CT-COM_SimulateTest>
              <CalledNumber>None</CalledNumber>
              <DailDTMFConfirmNumber>None</DailDTMFConfirmNumber>
            </X_CT-COM_SimulateTest>
          </Tests>
        </PhyInterface>
        <PhyInterface instance="2">
          <InterfaceID>1</InterfaceID>
          <X_CT-COM_Stats>
            <PoorQualityList instance="1">
            </PoorQualityList>
            <PoorQualityList instance="2">
            </PoorQualityList>
            <PoorQualityList instance="3">
            </PoorQualityList>
            <PoorQualityList instance="4">
            </PoorQualityList>
            <PoorQualityList instance="5">
            </PoorQualityList>
            <PoorQualityList instance="6">
            </PoorQualityList>
            <PoorQualityList instance="7">
            </PoorQualityList>
            <PoorQualityList instance="8">
            </PoorQualityList>
            <PoorQualityList instance="9">
            </PoorQualityList>
            <PoorQualityList instance="10">
            </PoorQualityList>
            <PoorQualityList nextInstance="11" ></PoorQualityList>
          </X_CT-COM_Stats>
          <Tests>
            <TestState>None</TestState>
            <TestSelector>None</TestSelector>
            <X_CT-COM_SimulateTest>
              <CalledNumber>None</CalledNumber>
              <DailDTMFConfirmNumber>None</DailDTMFConfirmNumber>
            </X_CT-COM_SimulateTest>
          </Tests>
        </PhyInterface>
      </VoiceService>
      <VoiceService nextInstance="2" ></VoiceService>
      <X_CT-COM_IPTV>
        <IGMPEnable>FALSE</IGMPEnable>
      </X_CT-COM_IPTV>
    </Services>
    <X_CT-COM_UplinkQoS>
      <App instance="1">
      </App>
      <App instance="2">
      </App>
      <App nextInstance="3" ></App>
      <Classification instance="1">
      </Classification>
      <Classification instance="2">
      </Classification>
      <Classification instance="3">
      </Classification>
      <Classification instance="4">
      </Classification>
      <Classification nextInstance="5" ></Classification>
      <PriorityQueue instance="1">
        <Weight>40</Weight>
      </PriorityQueue>
      <PriorityQueue instance="2">
        <Priority>2</Priority>
        <Weight>30</Weight>
      </PriorityQueue>
      <PriorityQueue instance="3">
        <Priority>3</Priority>
        <Weight>20</Weight>
      </PriorityQueue>
      <PriorityQueue instance="4">
        <Priority>4</Priority>
        <Weight>10</Weight>
      </PriorityQueue>
      <PriorityQueue nextInstance="5" ></PriorityQueue>
    </X_CT-COM_UplinkQoS>
    <X_BROADCOM_COM_SrvControlCfg instance="1">
      <SrvName>HTTP</SrvName>
      <Protocol>TCP</Protocol>
      <DefaultPort>80</DefaultPort>
      <Port>80</Port>
      <LanAllow>TRUE</LanAllow>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="2">
      <SrvName>TELNET</SrvName>
      <Protocol>TCP</Protocol>
      <DefaultPort>23</DefaultPort>
      <Port>23</Port>
      <LanAllow>TRUE</LanAllow>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="3">
      <SrvName>SSH</SrvName>
      <Protocol>TCP</Protocol>
      <DefaultPort>22</DefaultPort>
      <Port>22</Port>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="4">
      <SrvName>FTP</SrvName>
      <Protocol>TCP</Protocol>
      <DefaultPort>21</DefaultPort>
      <Port>21</Port>
      <LanAllow>TRUE</LanAllow>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="5">
      <SrvName>TFTP</SrvName>
      <Protocol>UDP</Protocol>
      <DefaultPort>69</DefaultPort>
      <Port>69</Port>
      <LanAllow>TRUE</LanAllow>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="6">
      <SrvName>ICMP</SrvName>
      <Protocol>ICMP</Protocol>
      <LanAllow>TRUE</LanAllow>
      <WanAllow>TRUE</WanAllow>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg instance="7">
      <SrvName>SNMP</SrvName>
      <Protocol>UDP</Protocol>
      <DefaultPort>161</DefaultPort>
      <Port>161</Port>
    </X_BROADCOM_COM_SrvControlCfg>
    <X_BROADCOM_COM_SrvControlCfg nextInstance="8" ></X_BROADCOM_COM_SrvControlCfg>
  </InternetGatewayDevice>
</DslCpeConfig>';