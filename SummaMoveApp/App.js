import { NavigationContainer } from '@react-navigation/native';
import { createMaterialBottomTabNavigator } from '@react-navigation/material-bottom-tabs';
import { createStackNavigator } from '@react-navigation/stack';
import AboutScreen from './components/AboutScreen';
import SettingsScreen from './components/SettingsScreen';
import OefeningenScreen from './components/OefeningenScreen';
import PrestatieScreen from './components/PrestatieScreen';

const Tab = createMaterialBottomTabNavigator();
const Stack = createStackNavigator();


function AppStack() {
  return (
    <Stack.Navigator>
      <Stack.Screen name="Prestaties" component={PrestatieScreen} />
      <Stack.Screen name="Oefeningen" component={OefeningenScreen} />
    </Stack.Navigator>
  );
}


function AppTabs() {
  return (
    <Tab.Navigator>
      <Tab.Screen name="Home" component={AppStack} />
      <Tab.Screen name="Over ons" component={AboutScreen} />
      <Tab.Screen name="Instellingen" component={SettingsScreen} />
    </Tab.Navigator>
  );
}

const App = () => {
  return (
    <NavigationContainer>
      <AppTabs />
    </NavigationContainer>
  );
}
export default App;
